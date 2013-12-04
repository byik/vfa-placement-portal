<div class="row">
	<div class="col-md-3"><span class="glyphicon glyphicon-phone"></span><span class="red date"> {{ Carbon::createFromFormat('Y-m-d H:i:s', $placementStatus->eventDate)->diffForHumans(); }}</span></div>
	<div class="col-md-9"><span>{{ $placementStatus->status}}</span></div>
</div>