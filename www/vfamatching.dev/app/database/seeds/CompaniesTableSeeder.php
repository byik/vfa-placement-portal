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
        $firstCompany->bio = "Chalkfly is an ecommerce startup in downtown Detroit. We sell school and office supplies online so we can give 5% of every sale back to teachers to buy school supplies for their students, but Chalkfly is so much more than that.
We're a team of misfits that work hard and play hard. We're constantly reinventing ourselves, and we're driven to make a dent in the world. At Chalkfly, feedback is king and no two days are the same.
So do you want to be a corporate cog when you grow up, or do you want to join us and build something that matters?";
        $firstCompany->twitterPitch = "Supply & Delight";
        $firstCompany->visionAnswer = "We want to be the Zappos of office supplies.";
        $firstCompany->needsAnswer = "We need eCommerce experts.";
        $firstCompany->teamAnswer = "Chalkfly is a team that works and plays hard.";
        $firstCompany->employees = 16;
        $firstCompany->yearFounded = 2012;
        $firstCompany->twitterHandle = "chalkfly";
        $firstCompany->isPublished = true;
        $firstCompany->hasFellow = true;
        $firstCompany->save();

        $secondCompany = new Company();
        $secondCompany->name = "Teespring";
        $secondCompany->city = "Providence";
        $secondCompany->url = "http://www.teespring.com";
        $secondCompany->twitterPitch = "Awesome Tshirts";
        $secondCompany->bio = "Teespring allows you to create & sell custom tees with zero upfront costs, and zero risk.
Create & sell t-shirts online the easy way. No paying thousands of dollars upfront, no guessing how many shirts or what sizes you'll need, and no passing out t-shirts one by one and chasing people down for cash.";
        $secondCompany->visionAnswer = "We want to sell all the world's t-shirt's.";
        $secondCompany->needsAnswer = "We need more people like Sean.";
        $secondCompany->teamAnswer = "Teespring is a fun team.";
        $secondCompany->employees = 30;
        $secondCompany->yearFounded = 2012;
        $secondCompany->twitterHandle = "teespring";
        $secondCompany->isPublished = true;
        $secondCompany->hasFellow = true;
        $secondCompany->save();
	}

}
