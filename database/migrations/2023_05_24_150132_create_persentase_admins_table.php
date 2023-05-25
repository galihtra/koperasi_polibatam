<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersentaseAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persentase_admin', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //nama Administrasi : Biaya Administrasi Konsumtif Biasa, dll
            $table->decimal('nilai', 4,2); //jumlah persen Administrasi
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
        Schema::dropIfExists('persentase_admins');
    }
}
