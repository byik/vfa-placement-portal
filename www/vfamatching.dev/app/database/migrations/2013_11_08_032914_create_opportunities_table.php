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
			$table->integer('company_id')->unsigned();
			$table->string('title');
			$table->string('description');
			$table->string('responsibilitiesAnswer');
			$table->string('skillsAnswer');
			$table->string('developmentAnswer');
			$table->boolean('isPublished');
			$table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
