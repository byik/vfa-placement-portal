<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFellowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fellows', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
			$table->boolean('isPublished');
			$table->text('bio', 1400);
			$table->string('school', 140);
			$table->string('major', 140);
			$table->string('degree');
			$table->integer('graduationYear');
			$table->string('hometown', 140);
			$table->boolean('isRemindable');
			$table->string('resumePath');
			$table->bigInteger('phoneNumber')->nullable();
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
		Schema::drop('fellows');
	}

}
