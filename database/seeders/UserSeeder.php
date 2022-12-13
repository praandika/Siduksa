<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'jordi',
            'password' => Hash::make('jordi123'),
            'name' => 'Astika Jordi',
            'address' => 'Kedonganan',
            'phone' => '082147084031',
            'email' => 'astikajordi25@gmail.com',
            'position' => 'System Administrator',
            'roles' => 'master',
        ]);

        User::insert([
            'username' => 'andika',
            'password' => Hash::make('andika123'),
            'name' => 'Andika Pranayoga',
            'address' => 'Sanur',
            'phone' => '081246571421',
            'email' => 'praandikayoga@gmail.com',
            'position' => 'Admin',
            'roles' => 'admin',
        ]);

        User::insert([
            'username' => 'dika',
            'password' => Hash::make('dika123'),
            'name' => 'Dika Yoga',
            'address' => 'Tabanan',
            'phone' => '081246571421',
            'email' => 'dikanayoga@gmail.com',
            'position' => 'Pimpinan',
            'roles' => 'pimpinan',
        ]);
    }
}
