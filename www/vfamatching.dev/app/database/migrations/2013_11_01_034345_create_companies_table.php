<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('city');
			$table->string('url');
			$table->string('tagline');
			$table->string('vision_answer');
			$table->string('needs_answer');
			$table->string('team_answer');
			$table->integer('employees');
			$table->integer('year_founded');
			$table->string('twitter_handle');
			$table->boolean('is_published');
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
		Schema::drop('companies');
	}

}
