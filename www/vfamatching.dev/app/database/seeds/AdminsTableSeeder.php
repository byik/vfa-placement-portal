<?php

class AdminsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('admins')->truncate();

		$firstAdmin = new Admin();
		$firstAdmin->phoneNumber = 9186850032;
		$firstAdmin->user()->associate(User::find(1));
		$firstAdmin->save();

		// Uncomment the below to run the seeder
		// DB::table('admins')->insert($admins);
	}

}
