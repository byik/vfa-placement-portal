<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDisplayPicturePathToFellowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fellows', function(Blueprint $table) {
			$table->string('displayPicturePath');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fellows', function(Blueprint $table) {
			$table->dropColumn('displayPicturePath');
		});
	}

}
