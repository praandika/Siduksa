<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Penjadwalan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request, $param){
        $start = $request->start;
        $end = $request->end;
        if ($param == 'penjualan') {
            $data = Penjualan::whereBetween('date', [$request->start, $request->end])
            ->orderBy('date','desc')->get();
            $title = 'Penjualan';
        } elseif($param == 'pembelian') {
            $data = Pembelian::whereBetween('date', [$request->start, $request->end])
            ->orderBy('date','desc')->get();
            $title = 'Pembelian';
        } elseif($param == 'labarugi') {
            $data = Pembelian::whereBetween('date', [$request->start, $request->end])
            ->orderBy('date','desc')->get();
            $title = 'Laba Rugi';
        } else {
            $data = Penjadwalan::whereBetween('date_stock_in', [$request->start, $request->end])
            ->orderBy('date_stock_in','desc')->get();
            $title = 'Produksi';
        }
        
        return view('page', compact('data','title','param','start','end'));
    }

    public function labarugi(Request $request){
        $title = 'Laba Rugi';
        $penjualan = Penjualan::whereBetween('date', [$request->start, $request->end])->sum('total');
        $pembelian = Pembelian::whereBetween('date', [$request->start, $request->end])->sum('total');

        $start = $request->start;
        $end = $request->end;

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
        
        return view('page', compact('penjualan','pembelian','laba','result','title','color','start','end'));
    }
}
