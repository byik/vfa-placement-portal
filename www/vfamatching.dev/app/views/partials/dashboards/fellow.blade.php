@if(count($placementStatuses) > 0)
	<div class="fellow-dash">
		<div class="container">
			<div class="upcoming-events">
					<h2><small>UPCOMING EVENTS<small></h2>
					<div class="row">
						<div class="col-md-3"><span class="glyphicon glyphicon-phone"></span><span class="red date"> March 23, 6:00pm</span></div>
						<div class="col-md-9"><span>Phone interview with Chalkfly</span></div>
					</div>
					<div class="row">
						<div class="col-md-3"><span class="glyphicon glyphicon-user"></span><span class="red date"> April 8, 2:00pm</span> </div>
						<div class="col-md-9"><span>In person interview with Teespring</span></div>
					</div>
					<div class="row">
						<div class="col-md-3"><span class="glyphicon glyphicon-user"></span><span class="red date"> April 12, 3:00pm</span></div>
						<div class="col-md-9"><span>In person interview with Swipely</span></div>
					</div>
					<div class="row">
						<div class="col-md-3"><span class="glyphicon glyphicon-thumbs-up"></span><span class="red date"> April 17, 5:00pm</span></div>
						<div class="col-md-9"><span>VCharge offer acceptance deadline</span></div>
					</div>
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