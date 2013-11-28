<?php

class PlacementstatusesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('placementstatuses')->truncate();

		//GEnerate some placement status
        //fellow, user id = 4
        //connected to opportunities id = 1 & id = 3
        $firstFellow = Fellow::find(1);
        $firstOpportunity = Opportunity::find(1);
        $thirdOpportunity = Opportunity::find(3);

        $firstPlacementStatus = new PlacementStatus();
        $firstPlacementStatus->status = "Introduced";
        $firstPlacementStatus->eventDate = null;
        $firstPlacementStatus->score = 2;
        $firstPlacementStatus->message = "I'm not so sure how I feel about this one...";
        $firstPlacementStatus->fellow_id = $firstFellow->id;
        $firstPlacementStatus->opportunity_id = $firstOpportunity->id;
        $firstPlacementStatus->isRecent = true;
        $firstPlacementStatus->save();

        $secondPlacementStatus = new PlacementStatus();
        $secondPlacementStatus->status = "Contacted";
        $secondPlacementStatus->eventDate = null;
        $secondPlacementStatus->score = 4;
        $secondPlacementStatus->message = "Seems like a perfect fit!";
        $secondPlacementStatus->fellow_id = $firstFellow->id;
        $secondPlacementStatus->opportunity_id = $thirdOpportunity->id;
        $secondPlacementStatus->isRecent = true;
        $secondPlacementStatus->save();
	}

}
