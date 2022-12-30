<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_aduan_kategori')->unsigned();
            $table->foreign('id_aduan_kategori')->references('id')->on('aduan_kategoris');
            $table->bigInteger('id_aduan_status')->unsigned();
            $table->foreign('id_aduan_status')->references('id')->on('aduan_statuses');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('userrs');
            $table->string('judul');
            $table->text('aduan');
            $table->bigInteger('dukungan');
            $table->dateTime('waktu');
            $table->tinyInteger('hide_status');
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
        Schema::dropIfExists('aduans');
    }
}
