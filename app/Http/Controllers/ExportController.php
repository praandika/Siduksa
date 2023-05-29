<?php

namespace App\Http\Controllers;

use App\Exports\PembelianExport;
use App\Exports\PenjualanExport;
use App\Exports\ProduksiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export($param, $start, $end){
        if ($param == 'penjualan') {
            return (new PenjualanExport)->start($start)->end($end)->download('Laporan_Penjualan_'.$start.'-'.$end.'.xlsx');
        } elseif ($param == 'produksi') {
            return (new ProduksiExport)->start($start)->end($end)->download('Laporan_Produksi_'.$start.'-'.$end.'.xlsx');
        } else {
            return (new PembelianExport)->start($start)->end($end)->download('Laporan_Pembelian_'.$start.'-'.$end.'.xlsx');
        }
        
    }
}
