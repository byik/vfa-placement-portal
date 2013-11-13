<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAdminNoteOpportunityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adminNote_opportunity', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('adminNote_id')->unsigned()->index();
			$table->integer('opportunity_id')->unsigned()->index();
			$table->foreign('adminNote_id')->references('id')->on('adminNotes')->onDelete('cascade');
			$table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adminNote_opportunity');
	}

}
