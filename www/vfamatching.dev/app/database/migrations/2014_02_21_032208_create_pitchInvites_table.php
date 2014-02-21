<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePitchInvitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pitchInvites', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('fellow_id')->unsigned();
			$table->integer('opportunity_id')->unsigned();
			$table->integer('pitch_id')->unsigned()->nullable();
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
		Schema::drop('pitchInvites');
	}

}
