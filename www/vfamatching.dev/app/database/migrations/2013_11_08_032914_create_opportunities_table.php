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
			$table->string('title', 70);
			$table->string('description', 1400);
			$table->string('responsibilitiesAnswer', 280);
			$table->string('skillsAnswer', 280);
			$table->string('developmentAnswer', 280);
			$table->boolean('isPublished');
			$table->timestamps();
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
		Schema::drop('opportunities');
	}

}
