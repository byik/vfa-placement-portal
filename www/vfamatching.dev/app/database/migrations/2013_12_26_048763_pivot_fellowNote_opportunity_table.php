<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotFellowNoteOpportunityTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowNote_opportunity', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fellowNote_id')->unsigned()->index();
            $table->integer('opportunity_id')->unsigned()->index();
            $table->foreign('fellowNote_id')->references('id')->on('fellowNotes')->onDelete('restrict');
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('restrict');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fellowNote_opportunity');
    }

}
