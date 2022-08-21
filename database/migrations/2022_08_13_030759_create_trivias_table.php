<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriviasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trivias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('trivia');

            $table->bigInteger('user_id')
            ->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->bigInteger('tag_id')
            ->foreign('tag_id')
            ->references('id')
            ->on('tags')->nullable();

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
        Schema::dropIfExists('trivias');
    }
}
