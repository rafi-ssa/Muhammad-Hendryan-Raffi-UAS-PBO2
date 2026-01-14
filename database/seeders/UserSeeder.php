<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus user lama jika ada agar tidak duplikat
        User::where('email', 'admin@masjid.com')->delete();

        // Buat user baru dengan password yang sudah di-HASH
        User::create([
            'name' => 'Admin Masjid',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('password'), // Passwordnya adalah: password
            'role' => 'admin',
        ]);
    }
}
