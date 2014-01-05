<div class="row">
    @if($placementStatus->status == PlacementStatus::statuses()[2])
    	<div class="col-md-3"><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }} </span></div>
        <div class="col-md-9"><span><i class="fa fa-mobile"></i>Phone Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[4])
        <div class="col-md-3"><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span><i class="fa fa-user"></i>On-site Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[6])
        <div class="col-md-3"><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span><i class="fa fa-thumbs-up"></i>Offer Acceptance Deadline</span></div>
    @endif
</div>