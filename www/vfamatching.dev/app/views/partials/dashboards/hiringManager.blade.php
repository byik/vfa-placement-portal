<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="pull-right staff-contact-info">
				<h4>Questions? Don't hesitate to reach out!</h4>
				<h6>Jason, 646-736-6460 x 406, jason@ventureforamerica.org</h6>
				<h6>Liz, 646-736-6460 x 407, elisabeth@ventureforamerica.org</h6>
				<h6>Mike, 646-736-6460 x 405, mike@ventureforamerica.org</h6>
			</div>
		</div>
	</div>
    @include('partials.components.pitches', array('pitches' => $newPitches))
    @foreach($opportunities as $opportunity)
    	<?php $placementStatuses = $opportunity->placementStatuses()
                ->where('isRecent','=',1)
                ->where('status', '<>', 'Bad Fit')
                ->orderBy('created_at', 'DESC')
                ->get(); ?>
    	<div class="col-xs-12 center"><h1>{{ $opportunity->title }}</h1></div>
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
				<p>{{ $opportunity->company->name }}'s {{ $opportunity->title }} Opportunity has no upcoming events at the moment</p>
			@endif
		</div>
		<div class="placementStatuses">
			<h2><small>Fellow Prospects</small></h2>
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
    @endforeach
</div>