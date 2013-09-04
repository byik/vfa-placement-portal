<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('users');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
			$table->timestamps();
		});
	}

}
