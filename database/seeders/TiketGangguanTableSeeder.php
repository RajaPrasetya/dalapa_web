<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TiketGangguan;
use Illuminate\Database\Seeder;

class TiketGangguanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiketGangguan::factory()->count(100)->create();
    }
}
