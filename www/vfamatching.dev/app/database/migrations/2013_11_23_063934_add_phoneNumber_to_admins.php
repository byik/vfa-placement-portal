<?php

use Illuminate\Database\Migrations\Migration;

class AddPhoneNumberToAdmins extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('admins', function($table)
		{
		    $table->bigInteger('phoneNumber')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('admins', function($table)
		{
		    $table->dropColumn('phoneNumber');
		});
	}

}