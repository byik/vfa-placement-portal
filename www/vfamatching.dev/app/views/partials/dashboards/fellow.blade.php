@if(count($placementStatuses) > 0)
	<div class="fellow-dash">
		<div class="container">
			<div class="upcoming-events">
					<h2><small>UPCOMING EVENTS</small></h2>
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
				<h2><small>Opportunity Prospects</small></h2>
                <div class="row">
                <?php $count = 0; ?>
                @foreach($placementStatuses as $placementStatus)
                    @include('partials.indexes.placementStatus', array('placementStatus' => $placementStatus))
                    <?php 
                        $count++;
                        if($count % 3 == 0){
                            echo '<div class="row"></div>';
                        }
                    ?>
                @endforeach
                </div>
            </div>
		</div>
	</div>
@else
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
        		<h4>Welcome to the Fellow Dashboard!</h4>
		    	<p>This is were you'll find your upcoming events and progress with each Opportunity you're interested in. But you haven't been introduced to any companies yet... <p>
		        <p>Head on over to the list of Opportunities and start pitching! Your pitches will be reviewed by VFA Staff, and you'll receive an email when they're approved.</p>
        	</div>
        </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="pull-right">
	        		<a href="{{ URL::route('opportunities.index') }}" class="btn btn-primary">View Opportunities</a>
	        	</div>
        	</div>
        </div>
    </div>
@endif