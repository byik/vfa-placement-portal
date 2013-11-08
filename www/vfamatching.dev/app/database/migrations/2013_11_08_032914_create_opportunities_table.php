<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpportunitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opportunities', function(Blueprint $table) {
			$table->increments('id');
			$table->int('company_id')->unsigned();
			$table->string('title');
			$table->string('description');
			$table->string('responsibilities_answer');
			$table->string('skills_answer');
			$table->string('development_answer');
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
		Schema::drop('opportunities');
	}

}
