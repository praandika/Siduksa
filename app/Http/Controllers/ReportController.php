<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\Penjadwalan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report($param){
        if ($param == 'penjualan') {
            $data = Penjualan::orderBy('date','desc')->limit(50)->get();
            $title = 'Penjualan';
        } elseif($param == 'pembelian') {
            $data = Pembelian::orderBy('date','desc')->limit(50)->get();
            $title = 'Pembelian';
        } elseif($param == 'labarugi') {
            $data = Pembelian::orderBy('date','desc')->limit(50)->get();
            $title = 'Laba Rugi';
        } else {
            $data = Penjadwalan::orderBy('date_stock_in','desc')->limit(50)->get();
            $title = 'Produksi';
        }
        
        return view('page', compact('data','title','param'));
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
