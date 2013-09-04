<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$firstUser = new User();
		$firstUser->email = "me@scottdlowe.com";
		$firstUser->password = Hash::make("scottsfakepassword");
		$firstUser->role = 'Admin';
		$firstUser->save();

		$secondUser = new User();
		$secondUser->email = "lowe0292@gmail.com";
		$secondUser->password = Hash::make("scottsfakepassword");
		$secondUser->role = 'Admin';
		$secondUser->save();

	}

}
