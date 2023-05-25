<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersentaseBungasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persentase_bunga', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //nama Bunga : Bunga Pinjaman Konsumtif Biasa, dll
            $table->decimal('nilai', 4,2); //jumlah persen bunga
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
        Schema::dropIfExists('persentase_bungas');
    }
}
