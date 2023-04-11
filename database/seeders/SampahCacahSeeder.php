<?php

namespace Database\Seeders;

use App\Models\SampahCacah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampahCacahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampahCacah::insert([
            'name' => 'Sampah Cacah',
            'price_kg' => 35000,
            'price_gram' => 35,
            'stock' => 0,
        ]);
    }
}
