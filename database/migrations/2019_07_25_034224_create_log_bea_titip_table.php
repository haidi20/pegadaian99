<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBeaTitipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('log_bea_titip', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('no_id')->nullable();
        //     $table->double('pembayaran')->default(0);
        //     $table->dateTime('tanggal_pembayaran')->nullable();
        //     $table->string('keterangan')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_bea_titip');
    }
}
