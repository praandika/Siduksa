<?php

namespace App\Http\Controllers;

use App\Models\Konversi;
use App\Http\Controllers\Controller;
use App\Models\SampahPlastik;
use Illuminate\Http\Request;

class KonversiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Konversi::orderBy('id','desc')->get();
        $sampahPlastik = SampahPlastik::orderBy('name','asc')->get();
        return view('page', compact('data','sampahPlastik'));
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
        $cekStok = $request->stok - $request->total_weight;
        if ($cekStok <= 0) {
            alert()->warning('Warning','Stok kurang!');
            return redirect()->back()->withInput()->with('display', true);;
        } else {
            $total_weight = $request->total_weight / 1000;
            // dd($total_weight);
            $data = new Konversi;
            $data->sampah_plastik_id = $request->sampah_plastik;
            $data->total_weight = $total_weight;
            $data->satuan = 'Kg';
            $data->recovery_factor = 0;
            $data->status = 'new';
            $data->save();

            $sisaStok = $cekStok / 1000;
            $sampah = SampahPlastik::find($request->sampah_plastik);
            $sampah->stock = $sisaStok;
            $sampah->update();
            toast('Data konversi berhasil disimpan','success');
            return redirect()->route('konversi.index')->with('display', true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konversi  $konversi
     * @return \Illuminate\Http\Response
     */
    public function show(Konversi $konversi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konversi  $konversi
     * @return \Illuminate\Http\Response
     */
    public function edit(Konversi $konversi)
    {
        return view('page', compact('konversi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konversi  $konversi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konversi $konversi)
    {
        $get_weight_old = Konversi::where('id', $konversi->id)->pluck('total_weight');
        $weight_old = $get_weight_old[0] * 1000;
        $weight_new = (float) $request->total_weight;
        $count_weight = $weight_old - $weight_new;
        $adjust_stok = $request->stok + $count_weight;
        // dd($weight_old, $weight_new, $count_weight, $adjust_stok);

        if ($adjust_stok < 0) {
            alert()->warning('Warning','Stok kurang!');
            return redirect()->back()->withInput();
        } else {
            $data = Konversi::find($konversi->id);
            $data->sampah_plastik_id = $request->sampah_plastik;
            $data->total_weight = $request->total_weight / 1000;
            $data->satuan = 'Kg';
            $data->update();

            $sisaStok = $adjust_stok / 1000;
            $sampah = SampahPlastik::find($request->sampah_plastik);
            $sampah->stock = $sisaStok;
            $sampah->update();
            toast('Data konversi berhasil diubah','success');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konversi  $konversi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konversi $konversi)
    {
        //
    }
}
