<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjualan
    public function penjualan(){
        return $this->hasMany(Penjualan::class);
    }
}
