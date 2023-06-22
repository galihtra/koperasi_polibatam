<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create([
            'nama' => 'Ketua Koperasi'
        ]);

        RoleUser::create([
            'nama' => 'Kepala Bagian Koperasi'
        ]);

        RoleUser::create([
            'nama' => 'SDM Koperasi'
        ]);

        RoleUser::create([
            'nama' => 'Bendahara Koperasi'
        ]);

        RoleUser::create([
            'nama' => 'Pengawas Koperasi'
        ]);

        RoleUser::create([
            'nama' => 'Anggota Koperasi'
        ]);
    }
}
