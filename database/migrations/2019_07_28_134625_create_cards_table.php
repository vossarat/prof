<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->date('birthday');
            $table->boolean('sex_id')->nullable();
            $table->boolean('marital_status_id')->nullable(); // семейное положение
            $table->date('experience')->nullable(); // стаж
            $table->date('experience_special')->nullable(); // стаж по специальности
            $table->string('dispensary')->nullable(); //Д-учет
            $table->date('tradeunion')->nullable(); // дата принятия в профсоюз
            $table->boolean('itshome')->nullable(); // наличие жилья
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
        Schema::dropIfExists('cards');
    }
}
