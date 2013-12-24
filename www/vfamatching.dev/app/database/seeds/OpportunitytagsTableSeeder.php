<?php

class OpportunitytagsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('opportunitytags')->truncate();

        //define a default list of opportunity tags
        $tags = array("sales", "marketing", "biz dev", "coding", "analytics", "seo", "fundraising", "advertising", "design", "branding", "research", "analysis", "due diligence", "testing", "quality assurance");

        //randomly assign tags to opportunities
        foreach(Opportunity::all() as $opportunity){
            $firstTag = new OpportunityTag();
            shuffle($tags);
            $firstTag->tag = $tags[0];
            $opportunity->opportunityTags()->save($firstTag);
            $secondTag = new OpportunityTag();
            shuffle($tags);
            $secondTag->tag = $tags[0];
            $opportunity->opportunityTags()->save($secondTag);
            $thirdTag = new OpportunityTag();
            shuffle($tags);
            $thirdTag->tag = $tags[0];
            $opportunity->opportunityTags()->save($thirdTag);
        }

		// Uncomment the below to run the seeder
		// DB::table('opportunitytags')->insert($opportunitytags);
	}

}
