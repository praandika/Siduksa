<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Konversi;
use App\Models\Mesin;

class Penjadwalan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Konversi, penjadwalan has konversi_id
    public function konversi(){
        return $this->belongsTo(Konversi::class);
    }

    // Relasi to Mesin, penjadwalan has mesin_id
    public function mesin(){
        return $this->belongsTo(Mesin::class);
    }
}
