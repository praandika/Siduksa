<?php

namespace App\Http\Controllers;

use App\Models\Penjadwalan;
use App\Http\Controllers\Controller;
use App\Models\Konversi;
use App\Models\Mesin;
use App\Models\SampahCacah;
use App\Models\SampahPlastik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
        $data = Penjadwalan::join('sampah_plastiks','penjadwalans.sampah_plastik_id','=','sampah_plastiks.id')
        ->join('mesins','penjadwalans.mesin_id','=','mesins.id')
        ->select('mesins.id as mesin_id', 'mesins.name as mesin_name', 'mesins.status as mesin_status', 'penjadwalans.*')
        ->orderBy('penjadwalans.date_stock_in','desc')->get();
        $sampahPlastik = SampahPlastik::where('type','!=','Campuran')->get();
        $mesin = Mesin::where('status','offline')->orderBy('name','asc')->get();
        return view('page', compact('data','sampahPlastik','mesin','now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
        $data = new Penjadwalan;
        $data->mesin_id = $request->mesin_id;
        $data->sampah_plastik_id = $request->sampah_id;
        $data->first_stock = $request->first_stock / 1000;
        $data->last_stock = 0;
        $data->date_stock_in = $now;
        $data->status = 'on progress';
        $data->save();

        $mesin = Mesin::find($request->mesin_id);
        $mesin->status = 'online';
        $mesin->update();

        // Update Stock
        $stok = ($request->stock - $request->first_stock) / 1000;
        $updateStock = SampahPlastik::find($request->sampah_id);
        $updateStock->stock = $stok;
        $updateStock->update();

        toast('Data penjadwalan berhasil disimpan','success');
        return redirect()->route('penjadwalan.index')->with('display', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjadwalan $penjadwalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjadwalan $penjadwalan)
    {
        $sampahCacah = SampahCacah::all();
        return view('page', compact('penjadwalan', 'sampahCacah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjadwalan $penjadwalan)
    {
        $getAvgFirstStock = Penjadwalan::selectRaw('AVG(first_stock) as fs')->limit(30)->pluck('fs');
        $avgFristStock = $getAvgFirstStock[0];

        $getAvgLastStock = Penjadwalan::selectRaw('AVG(last_stock) as ls')->limit(30)->pluck('ls');
        $avgLastStock = $getAvgLastStock[0];

        $countPenjadwalan = Penjadwalan::count();
        
        if ($countPenjadwalan < 30) {
            $last_stock = $request->last_stock / 1000;
            $recovery_factor = ($last_stock / (float) $request->first_stock) * 100;
        } else {
            $recovery_factor = ($avgLastStock / $avgFristStock) * 100;
            // dd($avgFristStock, "avg last stock ".$avgLastStock, $recovery_factor);
        }
        
        $now = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
        $data = Penjadwalan::find($penjadwalan->id);
        $data->recovery_factor = round($recovery_factor,2);
        $data->last_stock = $request->last_stock / 1000;
        $data->date_stock_out = $now;
        $data->status = 'finished';
        $data->update();

        $mesin = Mesin::find($request->mesin_id);
        $mesin->status = 'offline';
        $mesin->update();

        $data = SampahCacah::find($request->sampah_cacah_id);
        $data->stock = ($request->stock + $request->last_stock) / 1000;
        $data->update();

        toast('Penjadwalan selesai','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjadwalan  $penjadwalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjadwalan $penjadwalan)
    {
        //
    }
}
