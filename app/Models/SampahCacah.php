<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiPenjualan;
use App\Models\Pengiriman;

class SampahCacah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Transaksi Penjualan
    public function transaksiPenjualan(){
        return $this->hasMany(TransaksiPenjualan::class);
    }

    // Relasi to Pengiriman
    public function pengiriman(){
        return $this->hasMany(Pengiriman::class);
    }
}
