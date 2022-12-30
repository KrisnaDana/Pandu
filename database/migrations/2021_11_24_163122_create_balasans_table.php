<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balasans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemerintah')->unsigned();
            $table->foreign('id_pemerintah')->references('id')->on('pemerintahs');
            $table->bigInteger('id_aduan')->unsigned();
            $table->foreign('id_aduan')->references('id')->on('aduans');
            $table->text('balasan');
            $table->dateTime('waktu');
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
        Schema::dropIfExists('balasans');
    }
}
