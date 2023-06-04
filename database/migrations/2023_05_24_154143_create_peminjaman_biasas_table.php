<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBiasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_biasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biayaBunga_id');
            $table->unsignedBigInteger('biayaAdmin_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('biayaBunga_id')->references('id')->on('persentase_bunga');
            $table->foreign('biayaAdmin_id')->references('id')->on('persentase_admin');
            $table->string('alasan_pinjam');
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_per_month', 10, 2);
            $table->string('status')->default('Menunggu');
            $table->string('status_pinjaman')->default('Belum Lunas');
            $table->integer('duration')->nullable(); // tambahkan baris ini
            $table->date('repayment_date')->nullable();
            $table->string('ttd'); //Upload Scan Tanda Tangan
            $table->string('up_ket'); //Upload surat keterangan
            $table->json('paid_months');
            $table->decimal('remaining_amount', 10, 2)->default(0);
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
        Schema::dropIfExists('peminjaman_biasa');
    }
}
