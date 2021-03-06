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
                '1'
            )
        NOT NULL AFTER kekurangan;"); 

        Schema::table('akad', function (Blueprint $table) {
            $table->integer('maintenance')->default(0);
            $table->string('username')->nullable();
            $table->string('laporan_maintenance')->nullable();
            $table->string('detail_jenis_barang')->default('smartphone');
            $table->string('kelengkapan_barang_satu')->nullable();
            $table->string('kelengkapan_barang_dua')->nullable();
            $table->string('kelengkapan_barang_tiga')->nullable();
            $table->integer('opsi_pembayaran')->default(7);
            $table->string('status_akad')->default('baru');
            $table->string('status_lokasi')->default('kantor');
            $table->string('target_lokasi')->default('gudang');
        });      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  DB::statement("ALTER TABLE
        // akad MODIFY COLUMN
        //     jangka_waktu_akad enum(
        //         '60',
        //         '30'
        //     )
        // NOT NULL AFTER kekurangan;") ;    
    }
}
