
.<?php

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
        $fourthOpportunity = Opportunity::find(4);
        $fifthOpportunity = Opportunity::find(5);
        $sixthOpportunity = Opportunity::find(6);

        $firstPlacementStatus = new PlacementStatus();
        $firstPlacementStatus->status = "Introduced";
        $firstPlacementStatus->eventDate = null;
        $firstPlacementStatus->score = null;
        $firstPlacementStatus->message = "I'm not so sure how I feel about this one...";
        $firstPlacementStatus->fellow_id = $firstFellow->id;
        $firstPlacementStatus->opportunity_id = $firstOpportunity->id;
        $firstPlacementStatus->isRecent = true;
        $firstPlacementStatus->fromRole = "Admin";
        $firstPlacementStatus->save();

        $secondPlacementStatus = new PlacementStatus();
        $secondPlacementStatus->status = "Contacted";
        $secondPlacementStatus->eventDate = null;
        $secondPlacementStatus->score = 4;
        $secondPlacementStatus->message = "Seems like a perfect fit!";
        $secondPlacementStatus->fellow_id = $firstFellow->id;
        $secondPlacementStatus->opportunity_id = $thirdOpportunity->id;
        $secondPlacementStatus->isRecent = true;
        $secondPlacementStatus->fromRole = "Fellow";
        $secondPlacementStatus->save();

        $thirdPlacementStatus = new PlacementStatus();
        $thirdPlacementStatus->status = "Introduced";
        $thirdPlacementStatus->eventDate = null;
        $thirdPlacementStatus->score = null;
        $thirdPlacementStatus->message = "Seems like a perfect fit!";
        $thirdPlacementStatus->fellow_id = $firstFellow->id;
        $thirdPlacementStatus->opportunity_id = $fourthOpportunity->id;
        $thirdPlacementStatus->isRecent = true;
        $thirdPlacementStatus->fromRole = "Admin";
        $thirdPlacementStatus->save();

        $fourthPlacementStatus = new PlacementStatus();
        $fourthPlacementStatus->status = "Introduced";
        $fourthPlacementStatus->eventDate = null;
        $fourthPlacementStatus->score = null;
        $fourthPlacementStatus->message = "Seems like a perfect fit!";
        $fourthPlacementStatus->fellow_id = $firstFellow->id;
        $fourthPlacementStatus->opportunity_id = $fifthOpportunity->id;
        $fourthPlacementStatus->isRecent = true;
        $fourthPlacementStatus->fromRole = "Admin";
        $fourthPlacementStatus->save();

        $fifthPlacementStatus = new PlacementStatus();
        $fifthPlacementStatus->status = "Introduced";
        $fifthPlacementStatus->eventDate = null;
        $fifthPlacementStatus->score = null;
        $fifthPlacementStatus->message = "Seems like a perfect fit!";
        $fifthPlacementStatus->fellow_id = $firstFellow->id;
        $fifthPlacementStatus->opportunity_id = $sixthOpportunity->id;
        $fifthPlacementStatus->isRecent = true;
        $fifthPlacementStatus->fromRole = "Admin";
        $fifthPlacementStatus->save();
	}

}
