<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adminNotes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('admin_id')->unsigned();
			$table->foreign('admin_id')->references('id')->on('admins')->onDelete('restrict');
			$table->text('content');
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
		Schema::drop('adminNotes');
	}

}
