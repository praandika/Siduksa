<?php

namespace App\Http\Livewire;

use App\Models\Penjualan;
use Carbon\Carbon;
use Livewire\Component;

class InfoPenjualan extends Component
{
    public function render()
    {
        $year = Carbon::now('GMT+8')->format('Y');
        $yesterday = Carbon::yesterday('GMT+8')->format('Y-m-d');
        $today = Carbon::now('GMT+8')->format('Y-m-d');
        $total = Penjualan::whereYear('date', $year)->sum('total');
        $totalYes = Penjualan::where('date', $yesterday)->sum('total');
        $totalToday = Penjualan::where('date', $today)->sum('total');
        if ($totalToday == 0 || $totalToday == null) {
            $percent = 0;
        } else {
            $percent = (($totalToday / $totalYes)*100)-1;
        }
        
        return view('livewire.info-penjualan', compact('year','total','percent'));
    }
}
