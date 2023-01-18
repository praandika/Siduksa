<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Http\Controllers\Controller;
use App\Models\Pengepul;
use App\Models\SampahPlastik;
use App\Models\TransaksiPembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    public function pembelianTransaction($invoice = null){
        $now = Carbon::now('GMT+8')->format('Y-m-d');
        $pengepul = Pengepul::orderBy('name','asc')->get();
        $sampah = SampahPlastik::orderBy('name','asc')->get();

        if ($invoice == null) {
            $random = Carbon::now('GMT+8')->format('YmdHis');
            $count = Pembelian::count();
            $invoice = 'INV#'.$random.$count;
            $data = 'empty';
            return view('page',compact('now','pengepul','sampah','data','invoice'));
        } else {
            $data = TransaksiPembelian::join('sampah_plastiks','transaksi_pembelians.sampah_plastik_id','=','sampah_plastiks.id')
            ->join('pembelians','transaksi_pembelians.pembelian_id','=','pembelians.id')
            ->select('transaksi_pembelians.id as id_transaksi','sampah_plastiks.name','transaksi_pembelians.qty','transaksi_pembelians.satuan','transaksi_pembelians.harga')
            ->where('pembelians.invoice',$invoice)
            ->orderBy('created_at','desc')
            ->get();
            return view('page',compact('now','pengepul','sampah','data','invoice'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
