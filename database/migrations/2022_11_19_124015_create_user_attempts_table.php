<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_attempt_userId');
            $table->unsignedBigInteger('fk_attempt_gameId');
            $table->string('attempt');
            $table->boolean('check_attempt')->default(false);
            $table->timestamps();
            $table->foreign('fk_attempt_userId')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('fk_attempt_gameId')
                ->references('id')->on('games')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_attempts');
    }
}
