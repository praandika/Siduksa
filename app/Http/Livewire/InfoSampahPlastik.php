<?php

namespace App\Http\Livewire;

use App\Models\SampahPlastik;
use Livewire\Component;

class InfoSampahPlastik extends Component
{
    public function render()
    {
        $stok = SampahPlastik::sum('stock');
        $harga = SampahPlastik::sum('price_kg');
        $totalHarga = $harga * $stok;
        return view('livewire.info-sampah-plastik', compact('stok','totalHarga'));
    }
}
