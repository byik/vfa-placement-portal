<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotFellowMediaLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fellow_mediaLink', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('fellow_id')->unsigned()->index();
			$table->integer('media_link_id')->unsigned()->index();
			$table->foreign('fellow_id')->references('id')->on('fellows')->onDelete('cascade');
			$table->foreign('media_link_id')->references('id')->on('mediaLinks')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fellow_media_link');
	}

}
