@if(count($placementStatuses) > 0)
	<div class="fellow-dash">
		<div class="container">
			<div class="upcoming-events">
					<h2><small>Upcoming Events</small></h2>
					<?php $eventCount = 0; ?>
					@foreach($placementStatuses as $placementStatus)
						@if($placementStatus->eventDate != "")
							@include('partials.indexes.upcoming-events', array('placementStatus' => $placementStatus))
							<?php $eventCount += 1; ?>
						@endif
					@endforeach
					@if($eventCount == 0)
						<p>Based on your Placement Statuses below, you have no upcoming events.</p>
					@endif
			</div>
			<div class="placementStatuses">
				<h2><small>Placement Statuses</small></h2>
	                <div class="row">
	                	<?php $count = 1 ?>
						@foreach($placementStatuses as $placementStatus)
							@include('partials.indexes.placement-status', array('placementStatus' => $placementStatus))
							<?php if($count % 3 == 0) { //every third placementStatus ?>
								</div>
								<div class="row">
							<?php }
								$count += 1 ;
							 ?>
						@endforeach
				    </div>
			</div>
		</div>
	</div>
@else
	<p>Looks like you aren't introduced to any Opportunities yet...<p>
	<p>Head on over to the list of <a href="{{ URL::route('opportunities.index') }}">Opportunities</a> and start pitching!<p>
@endif