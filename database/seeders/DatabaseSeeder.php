<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Menyuntikkan akun rahasia Hanif ke database
        User::create([
            'name' => 'Muhammad Hanif',
            'email' => 'hanif@kehidupan.com',
            'password' => Hash::make('kehidupan88'), // Ini adalah password Anda
        ]);
    }
}