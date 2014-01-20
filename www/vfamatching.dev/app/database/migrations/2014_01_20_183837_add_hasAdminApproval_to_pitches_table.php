<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHasAdminApprovalToPitchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pitches', function(Blueprint $table) {
			$table->boolean('hasAdminApproval');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pitches', function(Blueprint $table) {
			$table->dropColumn('hasAdminApproval');
		});
	}

}
