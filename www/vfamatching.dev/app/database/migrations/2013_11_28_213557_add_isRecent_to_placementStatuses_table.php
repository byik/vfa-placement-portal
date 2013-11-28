<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIsRecentToPlacementStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('placementStatuses', function(Blueprint $table) {
			$table->boolean('isRecent');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('placementStatuses', function(Blueprint $table) {
            $table->dropColumn('isRecent');
		});
	}

}
