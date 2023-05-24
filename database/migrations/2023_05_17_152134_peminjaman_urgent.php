<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeminjamanUrgent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_urgent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('jenis_pinjaman');
            $table->string('no_nik');
            $table->string('alamat');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('bagian');
            $table->string('dosen_staff');
            $table->string('email');
            $table->string('alasan_pinjam');
            $table->integer('no_rek');
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_per_month', 10, 2);
            $table->string('status')->default('Menunggu');
            $table->integer('duration')->nullable(); // tambahkan baris ini
            $table->date('repayment_date')->nullable();
            $table->string('ttd'); //Upload Scan Tanda Tangan
            $table->string('up_ket'); //Upload Scan Tanda Tangan
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
        Schema::dropIfExists('peminjaman_urgent');
    }
}