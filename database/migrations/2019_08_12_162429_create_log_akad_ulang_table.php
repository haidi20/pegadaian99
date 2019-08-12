<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAkadUlangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_akad_ulang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_id')->nullable();
            $table->double('debit')->default(0);
            $table->double('kredit')->default(0);
            $table->double('saldo')->default(0);
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
        Schema::dropIfExists('log_akad_ulang');
    }
}
