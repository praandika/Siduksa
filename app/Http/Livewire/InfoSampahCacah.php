<?php

namespace App\Http\Livewire;

use App\Models\SampahCacah;
use Livewire\Component;

class InfoSampahCacah extends Component
{
    public function render()
    {
        $stok = SampahCacah::sum('stock');
        $harga = SampahCacah::sum('price_kg');
        $totalHarga = $harga * $stok;
        return view('livewire.info-sampah-cacah', compact('stok','totalHarga'));
    }
}
