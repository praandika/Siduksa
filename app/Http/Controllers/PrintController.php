<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPenjualan;
use App\Models\Penjualan;
use App\Models\Pembelian;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function invoice($param, $invoice){
        $printDate = Carbon::now('GMT+8')->format('j F Y H:i:s');
        if ($param == 'penjualan') {
            $data = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
            ->where('penjualans.invoice',$invoice)
            ->get();
            $invoiceTo = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
            ->join('suppliers','penjualans.supplier_id','suppliers.id')
            ->where('penjualans.invoice',$invoice)
            ->pluck('suppliers.name');
            $invoiceTo = $invoiceTo[0];

            $address = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
            ->join('suppliers','penjualans.supplier_id','suppliers.id')
            ->where('penjualans.invoice',$invoice)
            ->pluck('suppliers.address');
            $address = $address[0];

            $date = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
            ->where('penjualans.invoice',$invoice)
            ->pluck('penjualans.date');
            $date = $date[0];

            $grandTotal = TransaksiPenjualan::join('penjualans','transaksi_penjualans.penjualan_id','penjualans.id')
            ->where('penjualans.invoice',$invoice)
            ->pluck('penjualans.total');
            $grandTotal = $grandTotal[0];
        } else {
            $data = TransaksiPembelian::join('pembelians','transaksi_pembelians.pembelian_id','pembelians.id')
            ->where('pembelians.invoice',$invoice)
            ->get();
            $invoiceTo = TransaksiPembelian::join('pembelians','transaksi_pembelians.pembelian_id','pembelians.id')
            ->join('pengepuls','pembelians.pengepul_id','pengepuls.id')
            ->where('pembelians.invoice',$invoice)
            ->pluck('pengepuls.name');
            $invoiceTo = $invoiceTo[0];

            $address = TransaksiPembelian::join('pembelians','transaksi_pembelians.pembelian_id','pembelians.id')
            ->join('pengepuls','pembelians.pengepul_id','pengepuls.id')
            ->where('pembelians.invoice',$invoice)
            ->pluck('pengepuls.address');
            $address = $address[0];

            $date = TransaksiPembelian::join('pembelians','transaksi_pembelians.pembelian_id','pembelians.id')
            ->where('pembelians.invoice',$invoice)
            ->pluck('pembelians.date');
            $date = $date[0];

            $grandTotal = TransaksiPembelian::join('pembelians','transaksi_pembelians.pembelian_id','pembelians.id')
            ->where('pembelians.invoice',$invoice)
            ->pluck('pembelians.total');
            $grandTotal = $grandTotal[0];
        }
        
        $pdf = PDF::loadView('print.pdf-invoice',compact('data','invoice','printDate','param','address','invoiceTo','date','grandTotal'));
        $pdf->setPaper('A5', 'potrait');
        return $pdf->stream('invoice_'.$param.'_'.$invoice.'.pdf');
    }

    public function labarugi($start, $end){
        $title = 'Laba Rugi';
        $penjualan = Penjualan::whereBetween('date', [$start, $end])->sum('total');
        $pembelian = Pembelian::whereBetween('date', [$start, $end])->sum('total');

        $laba = $penjualan - $pembelian;
        
        if ($laba > 0) {
            $result = 'Laba';
            $color = 'green';
        } elseif($laba < 0) {
            $result = 'Rugi';
            $color = 'crimson';
        } else {
            $result = 'BEP';
            $color = 'black';
        }

        $pdf = PDF::loadView('print.pdf-labarugi',compact('penjualan','pembelian','laba','result','title','color','start','end'));
        $pdf->setPaper('A5', 'potrait');
        return $pdf->stream('labarugi'.$start.'_'.$end.'.pdf');
    }
}
