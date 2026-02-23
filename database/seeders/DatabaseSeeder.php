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
            'nama_anggota' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'nis' => '539231111',
            'jurusan' => 'admin',
            'kelas'  => 'x',
            'role'     => 'admin',

        ]);
    }
}
