<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Untuk Anggota Koperasi
        User::create([
            'name' => 'Galih',
            'email' => 'galih@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => '',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 0,
            'is_ketua' => 0,
            'is_pengawas' => 0,
            'is_approved' => 0,
            'approved_at' => now(),
            'no_ktp' => '210380186',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Laki-laki',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2004-04-06',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum GMP',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29463',
            'no_hp' => '087738479403',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SMP',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Supriyati',
            'npwp' => '0976584938',
            'no_telp_ext_ktr' => '88746583',
            'nik' => '5928948242',
            'no_rek_bni' => '402824941',
            'divisi' => 'Anggota',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Aktif',
        ]);

        User::create([
            'name' => 'Eka',
            'email' => 'eka@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => 'KPB-001-002',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 1,
            'is_ketua' => 0,
            'is_pengawas' => 0,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '210380183',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Perempuan',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2004-04-01',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum Melati',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29461',
            'no_hp' => '087738479402',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SMU',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Supriyati',
            'npwp' => '0976584933',
            'no_telp_ext_ktr' => '88746583',
            'nik' => '5928948247',
            'no_rek_bni' => '402824940',
            'divisi' => 'Kepala Bagian',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Aktif',
        ]);

        User::create([
            'name' => 'Siti',
            'email' => 'siti@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => 'KPB-001-003',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 0,
            'is_ketua' => 1,
            'is_pengawas' => 0,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '210380173',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Perempuan',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2003-04-01',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum Melati',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29461',
            'no_hp' => '087738479400',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SMU',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Retno',
            'npwp' => '0976584939',
            'no_telp_ext_ktr' => '88746580',
            'nik' => '5928948240',
            'no_rek_bni' => '402824946',
            'divisi' => 'Kepala Bagian',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Aktif',
        ]);

        User::create([
            'name' => 'Joko',
            'email' => 'joko@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => 'KPB-001-004',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 0,
            'is_ketua' => 0,
            'is_pengawas' => 1,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '210380123',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Laki-laki',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2003-09-01',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum Melati',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29461',
            'no_hp' => '087738479490',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SD',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Ratna',
            'npwp' => '0976584919',
            'no_telp_ext_ktr' => '88742580',
            'nik' => '5928948260',
            'no_rek_bni' => '402814946',
            'divisi' => 'Kepala Bidang',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Aktif',
        ]);

        User::create([
            'name' => 'Riko',
            'email' => 'riko@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => 'KPB-001-005',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 0,
            'is_ketua' => 0,
            'is_pengawas' => 0,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '220380123',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Laki-laki',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2001-09-01',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum Melati',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29462',
            'no_hp' => '087731479490',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SD',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Sari',
            'npwp' => '0976584959',
            'no_telp_ext_ktr' => '88142580',
            'nik' => '5922948260',
            'no_rek_bni' => '402813946',
            'divisi' => 'Kepala Bidang',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Non-aktif',
        ]);

        User::create([
            'name' => 'Reni',
            'email' => 'reni@gmail.com',
            'email_verified_at' => now(),
            'no_anggota' => 'KPB-001-006',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_bendahara' => 0,
            'is_ketua' => 0,
            'is_pengawas' => 0,
            'is_approved' => 1,
            'approved_at' => now(),
            'no_ktp' => '220321123',
            'masa_berlaku_ktp' => 'Seumur Hidup',
            'gender' => 'Laki-laki',
            'tmpt_lahir' => 'Batam',
            'tgl_lahir' => '2001-09-01',
            'alamat_ktp' => 'Batam',
            'kelu_ktp' => 'Perum Melati',
            'keca_ktp' => 'Batam kota',
            'kabu_ktp' => 'Kota Batam',
            'kode_pos' => '29422',
            'no_hp' => '087731979490',
            'stat_tmpt_tgl' => 'Milik Sendiri',
            'tgl_tmpti' => '2022-01-01',
            'pendd_akhir' => 'SMU',
            'stat_kawin' => 'Lajang',
            'nama_ibu_kdg' => 'Santi',
            'npwp' => '0976584955',
            'no_telp_ext_ktr' => '88142550',
            'nik' => '5922948260',
            'no_rek_bni' => '402815946',
            'divisi' => 'Kepala Bidang',
            'tgl_msk_prsh' => '2023-03-18',
            'stat_karyawan' => 'Kontrak',
            'up_foto' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_fc_ktp' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_id_card' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'up_ttd' => 'post-images/029loTRSiHBBBwvSX70Wy3JFpVS6ySuMmYkkXgEM.png',
            'stat_akun' => 'Aktif',
        ]);
    }
}
