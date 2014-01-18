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
			$table->string('name', 280);
			$table->string('city', 280);
			$table->string('url');
			$table->string('twitterPitch', 140);
			$table->string('visionAnswer', 280);
			$table->string('needsAnswer', 280);
			$table->string('teamAnswer', 280);
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
