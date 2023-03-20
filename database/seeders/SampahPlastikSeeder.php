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
            'price_gram' => 20,
            'stock' => 0,
        ]);

        SampahPlastik::insert([
            'name' => 'Sampah Campuran',
            'type' => 'Campuran',
            'price_kg' => 0,
            'price_gram' => 0,
            'stock' => 0,
        ]);
    }
}
