<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembelian;

class Pengepul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Pembelian
    public function pembelian(){
        return $this->hasMany(Pembelian::class);
    }
}
