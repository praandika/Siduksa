<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pengepul;
use App\Models\TransaksiPembelian;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to User, pembelian has user_id
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relasi to Pengepul, pembelian has pengepul_id
    public function pengepul(){
        return $this->belongsTo(Pengepul::class);
    }

    // Relasi to Transaksi Pembelian
    public function transaksiPembelian(){
        return $this->hasMany(TransaksiPembelian::class);
    }
}
