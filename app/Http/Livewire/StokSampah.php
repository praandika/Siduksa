<?php

namespace App\Http\Livewire;

use App\Models\SampahPlastik;
use Livewire\Component;

class StokSampah extends Component
{
    public function render()
    {
        $data = SampahPlastik::selectRaw('SUM(stock) as stock, type')->groupBy('type')->get();
        return view('livewire.stok-sampah', compact('data'));
    }
}
