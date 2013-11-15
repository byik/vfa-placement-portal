<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAdminNoteFellowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adminNote_fellow', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('adminNote_id')->unsigned()->index();
			$table->integer('fellow_id')->unsigned()->index();
			$table->foreign('adminNote_id')->references('id')->on('adminNotes')->onDelete('restrict');
			$table->foreign('fellow_id')->references('id')->on('fellows')->onDelete('restrict');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adminNote_fellow');
	}

}
