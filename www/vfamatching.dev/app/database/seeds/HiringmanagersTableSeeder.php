<?php

class HiringmanagersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('hiringmanagers')->truncate();

        $fifthUser = User::find(5);

        $firstCompany = Company::find(1);

        $firstHiringManager = new HiringManager();
        $firstHiringManager->user_id = $fifthUser->id;
        $firstHiringManager->company_id = $firstCompany->id;
        $firstHiringManager->phoneNumber = null;
        $firstHiringManager->save();

		// Uncomment the below to run the seeder
		// DB::table('hiringmanagers')->insert($hiringmanagers);
	}

}
