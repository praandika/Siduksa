<?php

namespace App\Http\Livewire;

use App\Models\Penjualan;
use App\Models\TransaksiPenjualan;
use Carbon\Carbon;
use Livewire\Component;

class ChartPenjualan extends Component
{
    public function render()
    {
        $year = Carbon::now('GMT+8')->format('Y');
        $jan = Penjualan::whereYear('date', $year)->whereMonth('date','1')->sum('total');
        $feb = Penjualan::whereYear('date', $year)->whereMonth('date','2')->sum('total');
        $mar = Penjualan::whereYear('date', $year)->whereMonth('date','3')->sum('total');
        $apr = Penjualan::whereYear('date', $year)->whereMonth('date','4')->sum('total');
        $may = Penjualan::whereYear('date', $year)->whereMonth('date','5')->sum('total');
        $jun = Penjualan::whereYear('date', $year)->whereMonth('date','6')->sum('total');
        $jul = Penjualan::whereYear('date', $year)->whereMonth('date','7')->sum('total');
        $aug = Penjualan::whereYear('date', $year)->whereMonth('date','8')->sum('total');
        $sep = Penjualan::whereYear('date', $year)->whereMonth('date','9')->sum('total');
        $oct = Penjualan::whereYear('date', $year)->whereMonth('date','10')->sum('total');
        $nov = Penjualan::whereYear('date', $year)->whereMonth('date','11')->sum('total');
        $dec = Penjualan::whereYear('date', $year)->whereMonth('date','12')->sum('total');
        $dataPenjualan = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];

        $totalG = TransaksiPenjualan::whereYear('date', $year)->where('satuan','Gram')->sum('qty');
        $totalKg = TransaksiPenjualan::whereYear('date', $year)->where('satuan','Kg')->sum('qty');
        $convertToKg = $totalG / 1000;

        $totalStokTerjual = $totalKg + $convertToKg;
        return view('livewire.chart-penjualan', compact('dataPenjualan', 'totalStokTerjual'));
    }
}
