<div class="row">
    @if($placementStatus->status == PlacementStatus::statuses()[2])
    	<div class="col-md-3"><span class="glyphicon glyphicon-phone"></span><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>Phone Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[4])
        <div class="col-md-3"><span class="glyphicon glyphicon-user"></span><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>On-site Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[6])
        <div class="col-md-3"><span class="glyphicon glyphicon-thumbs-up"></span><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>Offer Acceptance Deadline</span></div>
    @endif
</div>