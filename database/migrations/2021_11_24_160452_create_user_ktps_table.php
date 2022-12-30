<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ktps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user_data')->unsigned();
            $table->foreign('id_user_data')->references('id')->on('user_datas');
            $table->string('ktp_scan');
            $table->string('ktp_foto');
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
        Schema::dropIfExists('user_ktps');
    }
}
