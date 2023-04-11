<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Http\Controllers\Controller;
use App\Models\Mesin;
use App\Models\TransaksiPenjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sampah = TransaksiPenjualan::join('sampah_cacahs','transaksi_penjualans.sampah_cacah_id','sampah_cacahs.id')
        ->where('status','preparing')
        ->orderBy('id','asc')
        ->select('sampah_cacahs.name','transaksi_penjualans.qty','transaksi_penjualans.id','sampah_cacahs.id as sampah_id')
        ->get();
        $mesin = Mesin::all();
        $now = Carbon::now('GMT+8')->format('Y-m-d');
        $data = Pengiriman::orderBy('date','desc')->get();
        
        return view('page', compact('data','now','sampah','mesin'));
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
        $data = new Pengiriman;
        $data->production_date = $request->production_date;
        $data->mesin_id = $request->mesin_id;
        $data->transaksi_penjualan_id = $request->id_transaksi;
        $data->date = $request->date;
        $data->status = 'shipping';
        $data->save();

        $data = TransaksiPenjualan::find($request->id_transaksi);
        $data->status = 'shipping';
        $data->update();
        toast('Data pengiriman berhasil disimpan','success');
        return redirect()->route('pengiriman.index')->with('display',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response 
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        return view('page',compact('pengiriman'));
    }

    public function pengirimanDone($id)
    {
        $data = Pengiriman::find($id);
        $data->status = 'arrived';
        $data->update();
        toast('Terkirim!','success');
        return redirect()->route('pengiriman.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $data = Pengiriman::find($pengiriman->id);
        $data->production_date = $request->production_date;
        $data->date = $request->date;
        $data->update();
        toast('Data pengiriman berhasil diubah','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
}
