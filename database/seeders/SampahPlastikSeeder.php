<?php

namespace Database\Seeders;

use App\Models\SampahPlastik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampahPlastikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampahPlastik::insert([
            'name' => 'Botol Plastik',
            'type' => 'PETE',
            'price_kg' => 20000,
            'price_gram' => 2000,
            'price_pcs' => 0,
            'stock' => 50,
        ]);
    }
}
