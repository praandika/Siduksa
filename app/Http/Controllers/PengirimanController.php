<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Http\Controllers\Controller;
use App\Models\Mesin;
use App\Models\Penjualan;
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
        $sampah = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
        ->join('sampah_cacahs','transaksi_penjualans.sampah_cacah_id','sampah_cacahs.id')
        ->where('penjualans.status','preparing')
        ->orderBy('penjualans.id','asc')
        ->selectRaw('penjualans.invoice, SUM(IF(transaksi_penjualans.satuan = "Kg", ROUND(transaksi_penjualans.qty*1000, 0), ROUND(transaksi_penjualans.qty, 0))) as qty, sampah_cacahs.photo')
        ->groupBy('penjualans.invoice')
        ->get();
        $now = Carbon::now('GMT+8')->format('Y-m-d');
        $data = Pengiriman::join('penjualans','pengirimen.invoice','penjualans.invoice')
        ->join('transaksi_penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
        ->join('sampah_cacahs','transaksi_penjualans.sampah_cacah_id','sampah_cacahs.id')
        ->select('pengirimen.date','pengirimen.production_date','sampah_cacahs.photo','pengirimen.invoice','pengirimen.status','pengirimen.id')
        ->orderBy('pengirimen.date','desc')->get();
        
        return view('page', compact('data','now','sampah'));
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
        if ($request->sampah_name == '' || $request->qtykirim == '') {
            alert()->warning('Warning','Masih ada kolom kosong!');
            return redirect()->back()->with('display',true);
        } else {
            $data = new Pengiriman;
            $data->production_date = $request->production_date;
            $data->invoice = $request->invoice;
            $data->total = $request->qtykirim;
            $data->date = $request->date;
            $data->status = 'shipping';
            $data->save();

            $penjualan = Penjualan::where('invoice',$request->invoice)->first();
            $penjualan->status = 'shipping';
            $penjualan->update();
            toast('Data pengiriman berhasil disimpan','success');
            return redirect()->route('pengiriman.index')->with('display',true);
        }
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
