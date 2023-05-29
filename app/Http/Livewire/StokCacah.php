<?php

namespace App\Http\Livewire;

use App\Models\SampahCacah;
use Livewire\Component;

class StokCacah extends Component
{
    public function render()
    {
        $data = SampahCacah::selectRaw('SUM(stock) as stock, name, photo')->groupBy('name')->get();
        return view('livewire.stok-cacah', compact('data'));
    }
}
