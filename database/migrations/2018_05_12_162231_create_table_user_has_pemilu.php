<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserHasPemilu extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('user_has_pemilu', function (Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pemilu_id');
            $table->String('token')->nullable();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('pemilu_id')
                    ->references('id')
                    ->on('pemilu')
                    ->onDelete('cascade');
            
            $table->primary(['pemilu_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
        Schema::dropIfExists('pemilu');
    }

}
