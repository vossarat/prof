<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildBirthdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_birthdays', function (Blueprint $table) {
            /*$table->increments('id');
            $table->integer('card_id')->unsigned();
	        $table->foreign('card_id')
				->references('id')->on('cards')
				->onDelete('cascade');*/
	        $table->integer('card_id');
	        $table->date('birthday');
           /* $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_birthdays');
    }
}
