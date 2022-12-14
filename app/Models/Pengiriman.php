<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Pengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjualan, pengiriman has penjualan_id
    public function penjualan(){
        return $this->belongsTo(Penjualan::class);
    }
}
