<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTeaserToOpportunitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('opportunities', function(Blueprint $table) {
			$table->string('teaser', 140);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('opportunities', function(Blueprint $table) {
			$table->dropColumn('teaser');
		});
	}

}
