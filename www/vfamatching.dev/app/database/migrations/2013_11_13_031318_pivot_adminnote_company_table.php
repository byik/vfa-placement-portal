<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAdminNoteCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adminNote_company', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('adminNote_id')->unsigned()->index();
			$table->integer('company_id')->unsigned()->index();
			$table->foreign('adminNote_id')->references('id')->on('adminNotes')->onDelete('cascade');
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adminNote_company');
	}

}
