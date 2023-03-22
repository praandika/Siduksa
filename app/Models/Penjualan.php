<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Pengiriman;
use App\Models\TransaksiPenjualan;
class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to User, penjualan has user_id
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relasi to Supplier, penjualan has supplier_id
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    // Relasi to Pengiriman
    // public function pengiriman(){
    //     return $this->hasMany(Pengiriman::class);
    // }

    // Relasi to Transaksi Penjualan
    public function transaksiPenjualan(){
        return $this->hasMany(TransaksiPenjualan::class);
    }
}
