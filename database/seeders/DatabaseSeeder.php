<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'edellwizh',
            'email' => 'ellenacarmenia@gmail.com',
            'password' => bcrypt('1234567'),
            'nis' => '53923',
            'jurusan' => 'admin',
            'no_telp'  => '08123456789',
            'role'     => 'admin',

        ]);
    }
}
