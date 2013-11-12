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
			$table->string('visionAnswer');
			$table->string('needsAnswer');
			$table->string('teamAnswer');
			$table->integer('employees');
			$table->integer('yearFounded');
			$table->string('twitterHandle');
			$table->boolean('isPublished');
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
