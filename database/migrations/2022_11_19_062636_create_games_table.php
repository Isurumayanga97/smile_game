<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {


        Schema::create('games', function (Blueprint $table) {
            $time=time();
            $dateTime=(date("Y-m-d H:i:s",$time));
            $table->id();
            $table->unsignedBigInteger('fk_userID');
            $table->dateTime('participate_time')->default($dateTime);
            $table->timestamps();
            $table->foreign('fk_userID')
                ->references('id')->on('users')
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
        Schema::dropIfExists('games');
    }
}
