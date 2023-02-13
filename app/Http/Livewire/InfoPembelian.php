<?php

namespace App\Http\Livewire;

use App\Models\Pembelian;
use Carbon\Carbon;
use Livewire\Component;

class InfoPembelian extends Component
{
    public function render()
    {
        $year = Carbon::now('GMT+8')->format('Y');
        $yesterday = Carbon::yesterday('GMT+8')->format('Y-m-d');
        $today = Carbon::now('GMT+8')->format('Y-m-d');
        $total = Pembelian::whereYear('date', $year)->sum('total');
        $totalYes = Pembelian::where('date', $yesterday)->sum('total');
        $totalToday = Pembelian::where('date', $today)->sum('total');
        if ($totalToday == 0 || $totalToday == null) {
            $percent = 0;
        } else {
            $percent = (($totalToday / $totalYes)*100)-1;
        }
        return view('livewire.info-pembelian', compact('year','total','percent'));
    }
}
