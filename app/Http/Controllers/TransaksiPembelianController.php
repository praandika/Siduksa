<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPembelian;
use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\SampahPlastik;
use Illuminate\Http\Request;

class TransaksiPembelianController extends Controller
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
     * @param  \App\Models\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPembelian $transaksiPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPembelian $transaksiPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiPembelian $transaksiPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPembelian $transaksiPembelian)
    {
        //
    }

    public function delete($id){
        $sampah_id = TransaksiPembelian::where('id',$id)->sum('sampah_plastik_id');
        $pembelian_id = TransaksiPembelian::where('id',$id)->sum('pembelian_id');
        $qty = TransaksiPembelian::where('id',$id)->sum('qty');
        $satuan = TransaksiPembelian::where('id',$id)->pluck('satuan');
        $satuan = $satuan[0];
        $stok = SampahPlastik::where('id',$sampah_id)->sum('stock');
        $harga = TransaksiPembelian::where('id',$id)->sum('harga');
        
        // Update Stock
        if ($satuan == 'Gram') {
            $stok = $stok * 1000;
            $stokUpdate = ($stok - $qty) / 1000;
        } elseif ($satuan == 'Kg') {
            $stok = $stok * 1000;
            $qtyGram = $qty * 1000;
            $s = $stok - $qtyGram;
            $stokUpdate = $s / 1000;
        } else {
            $qtyGram = $qty * 1000;
            $s = $stok - $qtyGram;
            $stokUpdate = $s / 1000;
        }

        // Update Harga
        $total = Pembelian::where('id',$pembelian_id)->sum('total');
        $totalUpdate = $total - $harga;
        // dd('total '.$total, 'harga '.$harga, 'update '.$totalUpdate);
        
        $updateStock = SampahPlastik::find($sampah_id);
        $updateStock->stock = $stokUpdate;
        $updateStock->update();

        $updateTotal = Pembelian::find($pembelian_id);
        $updateTotal->total = $totalUpdate;
        $updateTotal->update();

        // Delete Transaksi
        TransaksiPembelian::find($id)->delete();
        toast('data terhapus','success');
        return redirect()->back();
    }
}
