<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mesin;
use App\Models\transaksiPenjualan;

class Pengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjualan, pengiriman has penjualan_id
    // public function penjualan(){
    //     return $this->belongsTo(Penjualan::class);
    // }

    // Relasi to Mesin, pengiriman has mesin_id
    public function mesin(){
        return $this->belongsTo(Mesin::class);
    }

    // // Relasi to Sampah Cacah, pengiriman has sampah_cacah_id
    // public function transaksiPenjualan(){
    //     return $this->belongsTo(transaksiPenjualan::class);
    // }
}
