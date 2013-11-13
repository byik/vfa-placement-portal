<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePitchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pitches', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('fellow_id')->unsigned();
			$table->integer('opportunity_id')->unsigned();
			$table->text('body');
			$table->string('status');
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
		Schema::drop('pitches');
	}

}
