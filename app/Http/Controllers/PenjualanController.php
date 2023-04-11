<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Controllers\Controller;
use App\Models\SampahCacah;
use App\Models\Supplier;
use App\Models\TransaksiPenjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::join('suppliers','penjualans.supplier_id','=','suppliers.id')
        ->orderBy('date','desc')->get();
        return view('page', compact('data'));
    }

    public function penjualanTransaction($invoice = null){
        $now = Carbon::now('GMT+8')->format('Y-m-d');
        $supplier = Supplier::orderBy('name','asc')->get();
        $sampah = SampahCacah::orderBy('name','asc')->get();

        if ($invoice == null) {
            $random = Carbon::now('GMT+8')->format('YmdHis');
            $count = Penjualan::count();
            $invoice = 'INV-'.$random.$count.'S';
            $data = 'empty';
            $id_penjualan = 0;
            $total = 0;
            $supplierName = null;
            $supplierId = null;
            $isInv = 0;
            return view('page',compact('now','supplier','sampah','data','invoice','id_penjualan','total','supplierId','supplierName','isInv'));
        } else {
            $data = TransaksiPenjualan::join('sampah_cacahs','transaksi_penjualans.sampah_cacah_id','=','sampah_cacahs.id')
            ->join('penjualans','transaksi_penjualans.penjualan_id','=','penjualans.id')
            ->select('transaksi_penjualans.id as id_transaksi','sampah_cacahs.name','transaksi_penjualans.qty','transaksi_penjualans.satuan','transaksi_penjualans.harga')
            ->where('penjualans.invoice',$invoice)
            ->orderBy('transaksi_penjualans.created_at','desc')
            ->get();

            $supplierName = Penjualan::join('suppliers','penjualans.supplier_id','suppliers.id')
            ->where('invoice',$invoice)->pluck('suppliers.name');
            $supplierName = $supplierName[0];

            $supplierId = Penjualan::where('invoice',$invoice)->pluck('supplier_id');
            $supplierId = $supplierId[0];

            $id_penjualan = Penjualan::where('invoice',$invoice)->sum('id');
            $total = Penjualan::where('invoice',$invoice)->sum('total');
            $isInv = Penjualan::where('invoice',$invoice)->count();
            return view('page',compact('now','supplier','sampah','data','invoice','id_penjualan','total','supplierId','supplierName','isInv'));
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
        // Cek radio button
        if ($request->berat == "gram") {
            $stok = ($request->stock - $request->qty) / 1000;
            $satuan = "Gram";
            $harga = $request->qty * $request->hargag;
        } elseif ($request->berat == "kg") {
            $qtyGram = $request->qty * 1000;
            $s = $request->stock - $qtyGram;
            $stok = $s / 1000;
            $satuan = "Kg";
            $harga = $request->qty * $request->hargakg;
        } else {
            $qtyGram = $request->qty * 1000;
            $s = $request->stock - $qtyGram;
            $stok = $s / 1000;
            $satuan = "Kg";
            $harga = $request->qty * $request->hargakg;
        }

        if ($request->qty > $request->stock) {
            alert()->error('Oops...','Quantity melebihi stok!');
            return redirect()->back();
        } else {
            // Cek If Invoice already store
            $cekInvoice = Penjualan::where('invoice',$request->invoice)->count();

            if ($cekInvoice > 0) {
                $data = new TransaksiPenjualan();
                $data->penjualan_id = $request->id_penjualan;
                $data->sampah_cacah_id = $request->sampah_id;
                $data->date = $request->date;
                $data->qty = $request->qty;
                $data->satuan = $satuan;
                $data->harga = $harga;
                $data->status = 'preparing';
                $data->created_at = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
                $data->save();

                $total = Penjualan::where('id',$request->id_penjualan)->sum('total');
                $total += $harga;

                $penjualan = Penjualan::find($request->id_penjualan);
                $penjualan->total = $total;
                $penjualan->update();

                // Update Stock
                $updateStock = SampahCacah::find($request->sampah_id);
                $updateStock->stock = $stok;
                $updateStock->update();

                return redirect('penjualan-transaction/'.$request->invoice)->withInput();
            } else {
                $penjualan = new Penjualan;
                $penjualan->user_id = Auth::user()->id;
                $penjualan->supplier_id = $request->supplier_id;
                $penjualan->invoice = $request->invoice;
                $penjualan->date = $request->date;
                $penjualan->total = $harga;
                $penjualan->status = 'unprint';
                $penjualan->save();

                $id_penjualan = Penjualan::where('invoice',$request->invoice)->sum('id');

                $data = new TransaksiPenjualan;
                $data->penjualan_id = $id_penjualan;
                $data->sampah_cacah_id = $request->sampah_id;
                $data->date = $request->date;
                $data->qty = $request->qty;
                $data->satuan = $satuan;
                $data->harga = $harga;
                $data->status = 'preparing';
                $data->created_at = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
                $data->save();

                // Update Stock
                $updateStock = SampahCacah::find($request->sampah_id);
                $updateStock->stock = $stok;
                $updateStock->update();

                return redirect('penjualan-transaction/'.$request->invoice)->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
