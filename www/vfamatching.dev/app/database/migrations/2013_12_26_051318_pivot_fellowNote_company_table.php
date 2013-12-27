<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotFellowNoteCompanyTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellowNote_company', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fellowNote_id')->unsigned()->index();
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('fellowNote_id')->references('id')->on('fellowNotes')->onDelete('restrict');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fellowNote_company');
    }

}
