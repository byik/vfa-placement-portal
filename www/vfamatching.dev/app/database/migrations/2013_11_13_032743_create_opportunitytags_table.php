<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpportunityTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opportunityTags', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('opportunity_id')->nullable();
			// $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('restrict');
			$table->string('tag');
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
		Schema::drop('opportunityTags');
	}

}
