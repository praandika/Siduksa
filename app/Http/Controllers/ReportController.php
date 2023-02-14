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
        } else {
            $data = Penjadwalan::orderBy('date_stock_in','desc')->limit(50)->get();
            $title = 'Produksi';
        }
        
        return view('page', compact('data','title','param'));
    }
}
