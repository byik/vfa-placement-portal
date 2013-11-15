<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('companies')->truncate();

		$firstCompany = new Company();
        $firstCompany->name = "Chalkfly";
        $firstCompany->city = "Detroit";
        $firstCompany->url = "http://www.chalkfly.com";
        $firstCompany->tagline = "Supply & Delight";
        $firstCompany->visionAnswer = "We want to be the Zappos of office supplies.";
        $firstCompany->needsAnswer = "We need eCommerce experts.";
        $firstCompany->teamAnswer = "Chalkfly is a team that works and plays hard.";
        $firstCompany->employees = 16;
        $firstCompany->yearFounded = 2012;
        $firstCompany->twitterHandle = "chalkfly";
        $firstCompany->isPublished = true;
        $firstCompany->save();
	}

}
