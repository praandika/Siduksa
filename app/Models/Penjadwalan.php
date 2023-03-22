<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mesin;
use App\Models\sampahPlastik;

class Penjadwalan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Sampah Plastik, penjadwalan has sampah_plastik_id
    public function sampahPlastik(){
        return $this->belongsTo(sampahPlastik::class);
    }

    // Relasi to Mesin, penjadwalan has mesin_id
    public function mesin(){
        return $this->belongsTo(Mesin::class);
    }
}
