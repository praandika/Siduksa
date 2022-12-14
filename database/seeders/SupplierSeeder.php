<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::insert([
            'name' => 'Bali Creative',
            'address' => 'Denpasar Barat',
            'contact' => '081246571421',
            'email' => 'balicrative@gmail.com',
            'instansi' => 'Bali Creative',
        ]);

        Supplier::insert([
            'name' => 'Zakaria Putri Purnama',
            'address' => 'Kuta Utara',
            'contact' => '081246571421',
            'email' => 'zakaprop@gmail.com',
            'instansi' => 'Zakaria Property',
        ]);
    }
}
