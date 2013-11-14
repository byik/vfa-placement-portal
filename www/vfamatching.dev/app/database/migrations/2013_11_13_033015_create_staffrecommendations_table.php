<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffRecommendationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffRecommendations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('opportunity_id')->nullable();
			// $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('restrict');
			$table->integer('fellow_id')->nullable();
			// $table->foreign('fellow_id')->references('id')->on('fellows')->onDelete('restrict');
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
		Schema::drop('staffRecommendations');
	}

}
