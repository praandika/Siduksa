<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;
use App\Models\SampahCacah;
use App\Models\Pengiriman;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjualan, transaksi penjualan has penjualan_id
    public function penjualan(){
        return $this->belongsTo(Penjualan::class);
    }

    // Relasi to Sampah Cacah, transaksi penjualan has sampah_cacah_id
    public function sampahCacah(){
        return $this->belongsTo(SampahCacah::class);
    }

    // Relasi to Pengiriman
    public function pengiriman(){
        return $this->hasMany(Pengiriman::class);
    }
}
