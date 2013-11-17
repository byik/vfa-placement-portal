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

                $secondCompany = new Company();
                $secondCompany->name = "Teespring";
                $secondCompany->city = "Providence";
                $secondCompany->url = "http://www.teespring.com";
                $secondCompany->tagline = "Awesome Tshirts";
                $secondCompany->visionAnswer = "We want to sell all the world's t-shirt's.";
                $secondCompany->needsAnswer = "We need more people like Sean.";
                $secondCompany->teamAnswer = "Teespring is a fun team.";
                $secondCompany->employees = 30;
                $secondCompany->yearFounded = 2012;
                $secondCompany->twitterHandle = "teespring";
                $secondCompany->isPublished = true;
                $secondCompany->save();
	}

}
