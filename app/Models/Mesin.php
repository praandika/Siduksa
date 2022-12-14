<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjadwalan;

class Mesin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi to Penjadwalan
    public function penjadwalan(){
        return $this->hasMany(Penjadwalan::class);
    }
}
