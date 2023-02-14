<?php

namespace App\Http\Controllers;

use App\Exports\PembelianExport;
use App\Exports\PenjualanExport;
use App\Exports\ProduksiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export(Request $request, $param){
        if ($param == 'penjualan') {
            return (new PenjualanExport)->start($request->start)->end($request->end)->download('Laporan_Penjualan_'.$request->start.'-'.$request->end.'.xlsx');
        } elseif ($param == 'produksi') {
            return (new ProduksiExport)->start($request->start)->end($request->end)->download('Laporan_Produksi_'.$request->start.'-'.$request->end.'.xlsx');
        } else {
            return (new PembelianExport)->start($request->start)->end($request->end)->download('Laporan_Pembelian_'.$request->start.'-'.$request->end.'.xlsx');
        }
        
    }
}
