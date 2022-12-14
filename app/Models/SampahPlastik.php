<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiPembelian;
use App\Models\Konversi;

class SampahPlastik extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Transaksi Pembelian
    public function transaksiPembelian(){
        return $this->hasMany(TransaksiPembelian::class);
    }

    // Relasi to Konversi
    public function konversi(){
        return $this->hasMany(Konversi::class);
    }
}
