<?php

namespace Database\Seeders;

use App\Models\PersentaseBunga;
use Illuminate\Database\Seeder;

class PersentaseBungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersentaseBunga::create([
            'nama' => 'Bunga Konsumtif Biasa',
            'nilai' => 0.9,
        ]);

        PersentaseBunga::create([
            'nama' => 'Bunga Konsumtif Khusus',
            'nilai' => 0.9,
        ]);
    }
}
