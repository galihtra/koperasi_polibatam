<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_anggota')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_approved')->default(false);
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('id_roles')->default(6);
            $table->foreign('id_roles')->references('id')->on('role_users');
            $table->string('no_ktp'); //nomor ktp
            $table->string('masa_berlaku_ktp'); //masa berlaku ktp
            $table->string('gender'); //jensi kelamin anggota
            $table->string('tmpt_lahir'); //tempat lahir
            $table->date('tgl_lahir'); //tanggal lahir
            $table->string('alamat_ktp'); //alamat sesuai ktp
            $table->string('kelu_ktp'); //kelurahan sesuai ktp
            $table->string('keca_ktp'); //kecamatan sesuai ktp
            $table->string('kabu_ktp'); //kabupaten sesuai ktp
            $table->string('kode_pos'); // kode pos 
            $table->string('alamat_pri')->nullable(); //alamat tidak sesuai ktp
            $table->string('kelu_pri')->nullable(); //kelurahan tidak sesuai ktp
            $table->string('keca_pri')->nullable(); //kecamatan tidak sesuai ktp
            $table->string('kabu_pri')->nullable(); //kabupaten tidak sesuai ktp
            $table->string('kode_pos_pri')->nullable(); //kodepos tidak sesuai ktp
            $table->string('no_telp_rmh')->nullable(); //nomor telepon rumah
            $table->string('no_hp')->unique(); //nomor hape
            $table->string('stat_tmpt_tgl'); //status tempat tinggal
            $table->date('tgl_tmpti'); //tanggal menempati alamat tersebut
            $table->string('pendd_akhir'); //pendidikan terakhir
            $table->string('stat_kawin'); //status perkawinan
            $table->string('nama_istri_suami')->nullable(); //nama Istri / Suami
            $table->string('jml_anak')->nullable(); //jumlah anak
            $table->string('nama_ibu_kdg'); //nama ibu kandung
            $table->string('npwp'); //NPWP
            $table->string('nama_ahli_waris')->nullable(); //nama ahli waris
            $table->string('hub_ahli_waris')->nullable(); //hubungan ahli waris
            $table->string('no_telp_ext_ktr'); //No telp EXT Kantor
            $table->string('nik'); //Nomor Induk Karyawan
            $table->string('no_rek_bni'); //Nomor Rekening Bank BNI 46
            $table->string('divisi'); //Divisi
            $table->string('tgl_msk_prsh'); //Tanggal Masuk ke Perusahaan
            $table->string('stat_karyawan'); //Status Karyawan
            $table->string('up_foto'); //Upload foto 2x3
            $table->string('up_fc_ktp'); //Upload foto copy KTP
            $table->string('up_id_card'); //Upload foto copy ID Card 
            $table->string('up_ttd'); //Upload Scan Tanda Tangan
            $table->string('stat_akun')->nullable(); //Status Akun Anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
