<?php

namespace Database\Seeders;

use App\Models\PersentaseAdmin;
use Illuminate\Database\Seeder;

class PersentaseAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersentaseAdmin::create([
            'nama' => 'Biaya Administrasi',
            'nilai' => 2,
        ]);
    }
}
