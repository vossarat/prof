<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biots', function (Blueprint $table) {
            $table->increments('id');            
            $table->date('date_of_entry')->nullable();            
            $table->integer('indicator_1')->nullable();
            $table->integer('indicator_2')->nullable();
            $table->string('indicator_3', 150)->nullable();
            $table->string('indicator_4', 150)->nullable();
            $table->string('indicator_5', 150)->nullable();
            $table->string('indicator_6', 150)->nullable();
            $table->integer('indicator_7')->nullable();
            $table->integer('indicator_8')->nullable();
            $table->integer('indicator_9')->nullable();
            $table->integer('indicator_10')->nullable();
            $table->integer('indicator_11')->nullable();
            $table->integer('indicator_12')->nullable();
            $table->integer('indicator_13')->nullable();
            $table->integer('indicator_14')->nullable();
            $table->integer('indicator_15')->nullable();
            $table->integer('indicator_16')->nullable();
            $table->integer('indicator_17')->nullable();
            $table->integer('indicator_18')->nullable();
            $table->integer('indicator_19')->nullable();
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
        Schema::dropIfExists('biots');
    }
}
