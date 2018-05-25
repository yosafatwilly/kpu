<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaslonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paslon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_urut');
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->string('nim_ketua');
            $table->string('nim_wakil');
            $table->string('angkatan_ketua');
            $table->string('angkatan_wakil');
            $table->string('jurusan_ketua');
            $table->string('jurusan_wakil');
            $table->string('foto_paslon');
            $table->string('visi');
            $table->string('misi');
            $table->unsignedInteger('id_pemilu');
            $table->timestamps();

            $table->foreign('id_pemilu')
                    ->references('id')
                    ->on('pemilu')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paslon');
    }
}
