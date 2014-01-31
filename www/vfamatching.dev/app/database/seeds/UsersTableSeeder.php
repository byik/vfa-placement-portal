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
		$firstUser->firstName = "Scott";
		$firstUser->lastName = "Lowe";
		$firstUser->requiresPasswordReset = false;
		$firstUser->passwordResetHash = null;
		$firstUser->save();

		$secondUser = new User();
		$secondUser->email = "lowe0292@gmail.com";
		$secondUser->password = Hash::make("scottsfakepassword");
		$secondUser->role = 'Admin';
		$secondUser->firstName = "Bruce";
		$secondUser->lastName = "Wayne";
		$secondUser->requiresPasswordReset = false;
		$secondUser->passwordResetHash = null;
		$secondUser->save();

		$thirdUser = new User();
		$thirdUser->email = "pennino.sean@gmail.com";
		$thirdUser->password = Hash::make("seansfakepassword");
		$thirdUser->role = 'Admin';
		$thirdUser->firstName = "Sean";
		$thirdUser->lastName = "Pennino";
		$thirdUser->requiresPasswordReset = false;
		$thirdUser->passwordResetHash = null;
		$thirdUser->save();

        $fourthUser = new User();
        $fourthUser->email = "scrub@gmail.com";
        $fourthUser->password = Hash::make("fellowfakepassword");
        $fourthUser->role = 'Fellow';
        $fourthUser->firstName = "John";
        $fourthUser->lastName = "Doe";
        $fourthUser->requiresPasswordReset = false;
		$fourthUser->passwordResetHash = null;
        $fourthUser->save();

        $fifthUser = new User();
        $fifthUser->email = "employer@gmail.com";
        $fifthUser->password = Hash::make("employerfakepassword");
        $fifthUser->role = 'Hiring Manager';
        $fifthUser->firstName = "Jane";
        $fifthUser->lastName = "Doe";
        $fifthUser->requiresPasswordReset = false;
		$fifthUser->passwordResetHash = null;
        $fifthUser->save();

        $sixthUser = new User();
        $sixthUser->email = "fellow@gmail.com";
        $sixthUser->password = Hash::make("fellowfakepassword");
        $sixthUser->role = 'Fellow';
        $sixthUser->firstName = "Julie";
        $sixthUser->lastName = "Bock";
        $sixthUser->requiresPasswordReset = false;
		$sixthUser->passwordResetHash = null;
        $sixthUser->save();

	}

}
