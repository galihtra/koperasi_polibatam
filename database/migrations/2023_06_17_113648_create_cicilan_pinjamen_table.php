<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCicilanPinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicilan_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pinjamanUrgent')->nullable();
            $table->unsignedBigInteger('id_pinjamanBiasa')->nullable();
            $table->unsignedBigInteger('id_pinjamanKhusus')->nullable();
            $table->foreign('id_pinjamanUrgent')->references('id')->on('peminjaman_urgent')->onDelete('cascade');
            $table->foreign('id_pinjamanBiasa')->references('id')->on('peminjaman_biasa')->onDelete('cascade');
            $table->foreign('id_pinjamanKhusus')->references('id')->on('peminjaman_khusus')->onDelete('cascade');
            $table->string('status');
            $table->decimal('jumlah_bayar', 10,2);
            $table->date('tgl_bayar');
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
        Schema::dropIfExists('cicilan_pinjamen');
    }
}
