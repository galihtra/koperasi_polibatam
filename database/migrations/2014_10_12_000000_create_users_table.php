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
            $table->string('no_ktp');
            $table->string('masa_berlaku_ktp');
            $table->string('gender');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat_ktp');
            $table->string('kelu_ktp');
            $table->string('keca_ktp');
            $table->string('kabu_ktp');
            $table->string('kode_pos');
            $table->string('alamat_pri')->nullable();
            $table->string('kelu_pri')->nullable();
            $table->string('keca_pri')->nullable();
            $table->string('kabu_pri')->nullable();
            $table->string('kode_pos_pri')->nullable();
            $table->string('no_telp_rmh')->nullable();
            $table->string('no_hp')->unique();
            $table->string('stat_tmpt_tgl');
            $table->date('tgl_tmpti');
            $table->string('pendd_akhir');
            $table->string('stat_kawin');
            $table->string('nama_istri_suami')->nullable();
            $table->string('jml_anak')->nullable();
            $table->string('nama_ibu_kdg');
            $table->string('npwp');
            $table->string('nama_ahli_waris')->nullable();
            $table->string('hub_ahli_waris')->nullable();
            $table->string('no_telp_ext_ktr');
            $table->string('nik');
            $table->string('no_rek_bni');
            $table->string('divisi');
            $table->string('tgl_msk_prsh');
            $table->string('stat_karyawan');
            $table->string('up_foto');
            $table->string('up_fc_ktp');
            $table->string('up_id_card');
            $table->string('up_ttd');
            $table->string('stat_akun');
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
