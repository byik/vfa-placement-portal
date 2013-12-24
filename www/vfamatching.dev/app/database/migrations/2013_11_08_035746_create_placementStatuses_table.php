<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacementStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('placementStatuses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('fellow_id')->unsigned();
			$table->integer('opportunity_id')->unsigned();
            $table->enum('status', array("Introduced", "Contacted", "Phone Interview Pending", "Phone Interview Complete", "On-site Interview Pending", "On-site Interview Complete", "Offer Extended", "Offer Accepted", "Bad Fit"));
			$table->datetime('eventDate')->nullable();
			$table->integer('score');
			$table->string('message', 280);
			$table->timestamps();
            $table->foreign('fellow_id')->references('id')->on('fellows')->onDelete('restrict');
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('restrict');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('placementStatuses');
	}

}