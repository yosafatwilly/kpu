<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table){
            $table->unsignedInteger('pemilu_id');
            $table->unsignedInteger('paslon_id');

            $table->foreign('pemilu_id')
                    ->references('id')
                    ->on('pemilu')
                    ->onDelete('cascade');
            
            $table->foreign('paslon_id')
                    ->references('id')
                    ->on('paslon')
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
        Schema::dropIfExists('vote');
    }
}
