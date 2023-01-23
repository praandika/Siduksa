<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\SampahCacah;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
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
     * @param  \App\Models\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    public function delete($id){
        $sampah_id = TransaksiPenjualan::where('id',$id)->sum('sampah_cacah_id');
        $penjualan_id = TransaksiPenjualan::where('id',$id)->sum('penjualan_id');
        $qty = TransaksiPenjualan::where('id',$id)->sum('qty');
        $satuan = TransaksiPenjualan::where('id',$id)->pluck('satuan');
        $satuan = $satuan[0];
        $stok = SampahCacah::where('id',$sampah_id)->sum('stock');
        $harga = TransaksiPenjualan::where('id',$id)->sum('harga');
        
        // Update Stock
        if ($satuan == 'Gram') {
            $stok = $stok * 1000;
            $stokUpdate = ($stok + $qty) / 1000;
        } elseif ($satuan == 'Kg') {
            $stok = $stok * 1000;
            $qtyGram = $qty * 1000;
            $s = $stok + $qtyGram;
            $stokUpdate = $s / 1000;
        } else {
            $qtyGram = $qty * 1000;
            $s = $stok + $qtyGram;
            $stokUpdate = $s / 1000;
        }

        // Update Harga
        $total = Penjualan::where('id',$penjualan_id)->sum('total');
        $totalUpdate = $total - $harga;
        // dd('total '.$total, 'harga '.$harga, 'update '.$totalUpdate);
        
        $updateStock = SampahCacah::find($sampah_id);
        $updateStock->stock = $stokUpdate;
        $updateStock->update();

        $updateTotal = Penjualan::find($penjualan_id);
        $updateTotal->total = $totalUpdate;
        $updateTotal->update();

        // Delete Transaksi
        TransaksiPenjualan::find($id)->delete();
        toast('data terhapus','success');
        return redirect()->back();
    }
}
