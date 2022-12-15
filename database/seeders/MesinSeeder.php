<?php

namespace Database\Seeders;

use App\Models\Mesin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mesin::insert([
            'name' => 'Mesin A',
            'capacity' => '10',
            'status' => 'offline',
        ]);

        Mesin::insert([
            'name' => 'Mesin B',
            'capacity' => '10',
            'status' => 'offline',
        ]);

        Mesin::insert([
            'name' => 'Mesin C',
            'capacity' => '10',
            'status' => 'online',
        ]);
    }
}
