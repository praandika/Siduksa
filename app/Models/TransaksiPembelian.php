<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembelian;
use App\Models\SampahPlastik;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Pembelian, transaksi pembelian has pembelian_id
    public function pembelian(){
        return $this->belongsTo(Pembelian::class);
    }

    // Relasi to Sampah Plastik, sampah plastik has sampah_plastik_id
    public function sampahPlastik(){
        return $this->belongsTo(SampahPlastik::class);
    }
}
