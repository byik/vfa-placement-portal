<div class="row">
    @if($placementStatus->status == PlacementStatus::statuses()[2])
    	<div class="col-md-3"><span class="red date"><i class="fa fa-mobile"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>Phone Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[4])
        <div class="col-md-3"><span class="red date"><i class="fa fa-user"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>On-site Interview</span></div>
    @elseif($placementStatus->status == PlacementStatus::statuses()[6])
        <div class="col-md-3"><span class="red date"><i class="fa fa-thumbs-up"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
        <div class="col-md-9"><span>Offer Acceptance Deadline</span></div>
    @endif
</div>