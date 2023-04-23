<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjadwalan;
use App\Models\Pengiriman;

class Mesin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjadwalan
    public function penjadwalan(){
        return $this->hasMany(Penjadwalan::class);
    }

    // // Relasi to Pengiriman
    // public function pengiriman(){
    //     return $this->hasMany(Pengiriman::class);
    // }
}
