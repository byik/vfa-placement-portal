<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdatePlacementStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//we're replacing Bad Fit with Conversation Closed
		Schema::table('placementStatuses', function(Blueprint $table) {
			$table->dropColumn('status');
		});

		Schema::table('placementStatuses', function(Blueprint $table) {
			$table->enum('status', array("Introduced", "Contacted", "Phone Interview Pending", "Phone Interview Complete", "On-site Interview Pending", "On-site Interview Complete", "Offer Extended", "Offer Accepted", "Conversation Closed"));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}

}
