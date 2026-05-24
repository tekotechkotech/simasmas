<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a dummy Masjid if it doesn't exist
        $masjidId = DB::table('masjids')->insertGetId([
            'name' => 'Masjid Raya Al-Bina',
            'alamat' => 'Jl. Pintu Satu Senayan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@simasmas.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'masjid_id' => null, // Super admin might not belong to a specific masjid
        ]);

        // Create Admin Masjid
        User::create([
            'name' => 'Admin Masjid Al-Bina',
            'email' => 'admin@simasmas.com',
            'password' => Hash::make('password'),
            'role' => 'admin_masjid',
            'masjid_id' => $masjidId,
        ]);

        // Create Takmir
        User::create([
            'name' => 'Takmir Masjid Al-Bina',
            'email' => 'takmir@simasmas.com',
            'password' => Hash::make('password'),
            'role' => 'takmir',
            'masjid_id' => $masjidId,
        ]);

        // Create Jamaah
        User::create([
            'name' => 'Jamaah Al-Bina',
            'email' => 'jamaah@simasmas.com',
            'password' => Hash::make('password'),
            'role' => 'jamaah',
            'masjid_id' => $masjidId,
        ]);
    }
}
