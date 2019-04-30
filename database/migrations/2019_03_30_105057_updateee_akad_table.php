<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateeeAkadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("ALTER TABLE
    akad MODIFY COLUMN jangka_waktu_akad enum(
                '60',
                '30',
                '15',
                '7',
                '1',
            )
        NOT NULL AFTER kekurangan;"); 

        // Schema::table('akad', function (Blueprint $table) {
        //     $table->string('kelengkapan_barang_satu')->nullable();
        //     $table->string('kelengkapan_barang_dua')->nullable();
        //     $table->string('kelengkapan_barang_tiga')->nullable();
        // });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement("ALTER TABLE
        akad MODIFY COLUMN
            jangka_waktu_akad enum(
                '60',
                '30'
            )
        NOT NULL AFTER kekurangan;") ;    
    }
}
