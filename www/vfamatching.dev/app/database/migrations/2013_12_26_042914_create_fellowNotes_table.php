<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFellowNotesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowNotes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fellow_id')->unsigned();
            $table->foreign('fellow_id')->references('id')->on('fellows')->onDelete('restrict');
            $table->text('content', 1400);
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
        Schema::drop('fellowNotes');
    }

}
