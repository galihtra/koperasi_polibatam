<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountTriggerBiasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER calculate_amount_peminjaman_biasa BEFORE INSERT ON peminjaman_biasa
            FOR EACH ROW
            BEGIN
                DECLARE biayaAdmin DECIMAL(10, 2);
                DECLARE biayaBunga DECIMAL(10, 2);
                
                SET biayaAdmin = (SELECT nilai FROM persentase_admin LIMIT 1);
                SET biayaBunga = (SELECT nilai FROM persentase_bunga WHERE nama = "Bunga Pinjaman Konsumtif Biasa" LIMIT 1);
                
                SET NEW.amount = NEW.amount + ((NEW.amount * biayaBunga) / 100) + ((NEW.amount * biayaAdmin) / 100);
                SET NEW.amount_per_month = NEW.amount / NEW.duration;
                SET NEW.remaining_amount = NEW.amount;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS calculate_amount_peminjaman_biasa');
    }
}
