<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('no_telepon')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
   p  * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
