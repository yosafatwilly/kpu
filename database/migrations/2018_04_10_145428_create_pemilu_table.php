<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemiluTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pemilu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tema_pemilu');
            $table->string('penyelenggara');
            $table->string('periode');
            $table->date('start_daftar');
            $table->date('end_daftar');
            $table->date('start_pemilu');
            $table->date('end_pemilu');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pemilu');
    }

}
