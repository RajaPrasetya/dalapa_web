<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin'
        ]);
        
        User::factory()->create([
            'name' => 'Teknisi',
            'email' => 'teknisi@example.com',
            'password' => bcrypt('teknisi1234'),
            'role' => 'teknisi'
        ]);

        $this->call([
            UsersTableSeeder::class,
            TiketGangguanTableSeeder::class,
            MaterialTableSeeder::class,
        ]);
    }
}
