<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'admin' => 1,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '210380184',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Laki-laki',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2004-06-13',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Taman Baloi',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29463',
            'no_hp' => '81311233445',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SMU',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Siti',
            'npwp' => '0976584939',
            'no_telp_ext_ktr' => '88746583',
            'nik' => '592894824',
            'no_rek_bni' => '402824942',
            'divisi' => 'Anggota',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'admin.jpg',
            'up_fc_ktp' => 'adminktp.jpg',
            'up_id_card' => 'admincard.jpg',
            'up_ttd' => 'adminttd.jpg',
            'stat_akun' => 'Aktif',
        ]);
    }
}
