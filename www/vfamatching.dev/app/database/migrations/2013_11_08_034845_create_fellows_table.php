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
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->boolean('is_published');
			$table->text('bio');
			$table->string('school');
			$table->string('major');
			$table->string('degree');
			$table->integer('graduation_year');
			$table->string('hometown');
			$table->boolean('is_remindable');
			$table->string('resume_path');
			$table->string('phone_number')->nullable();
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
