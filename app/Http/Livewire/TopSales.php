<?php

namespace App\Http\Livewire;

use App\Models\TransaksiPembelian;
use Livewire\Component;

class TopSales extends Component
{
    public function render()
    {
        $data = TransaksiPembelian::orderBy('date', 'desc')->limit('5')->get();
        return view('livewire.top-sales', compact('data'));
    }
}
