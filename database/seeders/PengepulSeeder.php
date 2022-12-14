<?php

namespace Database\Seeders;

use App\Models\Pengepul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengepulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengepul::insert([
            'name' => 'Andika',
            'address' => 'Sanur',
            'contact' => '081246571421',
            'email' => 'dika@gmail.com',
            'instansi' => '-',
        ]);
    }
}
