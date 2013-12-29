<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFromToPlacementStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('placementStatuses', function(Blueprint $table) {
			$table->enum('fromRole', array("Fellow", "Hiring Manager", "Admin"));
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
			$table->dropColumn('fromRole');
		});
	}

}
