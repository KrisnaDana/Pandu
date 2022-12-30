<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemerintahDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemerintah_datas', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nip');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('no_telepon');
            $table->string('alamat');
            $table->string('foto')->nullable();
            $table->bigInteger('id_pemerintah_jabatan')->unsigned();
            $table->foreign('id_pemerintah_jabatan')->references('id')->on('pemerintah_jabatans');
            $table->bigInteger('id_pemerintah')->unsigned();
            $table->foreign('id_pemerintah')->references('id')->on('pemerintahs');
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
        Schema::dropIfExists('pemerintah_datas');
    }
}
