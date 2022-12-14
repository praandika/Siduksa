<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SampahPlastik;
use App\Models\Penjadwalan;

class Konversi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Sampah Plastik, konversi has sampah_plastik_id
    public function sampahPlastik(){
        return $this->belongsTo(SampahPlastik::class);
    }

    // Relasi to Penjadwalan
    public function penjadwalan(){
        return $this->hasMany(Penjadwalan::class);
    }
}
