<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogEditAkadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_edit_akad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_id')->nullable();
            $table->double('total_bea_titip')->default(0);
            $table->string('status')->nullable();
            $table->date('tanggal_log')->nullable();
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
        Schema::dropIfExists('log_edit_akad');
    }
}
