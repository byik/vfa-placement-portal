@extends('layouts.default')

@section('header')
Dashboard
@stop

@section('content')

@if( Auth::check() )

	@if( Auth::user()->role == "Admin" )

	@elseif( Auth::user()->role == "Fellow")
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
				<div class="relationships">
					<h2><small>RELATIONSHIPS</small></h2>
                        <div class="row">
    						@foreach($relationships as $relationship)
                                <?php 
                                    $pieChart = new PieChart;
                                    $pieChart->id = $relationship->id;
                                    $pieChart->width = 100;
                                    $pieChart->height = 100;
                                    $pieChart->percent = $relationship->percent();
                                ?>
    							@include('partials.indexes.relationship', array('relationship' => $relationship))->nest('pieChart','partials.charts.pie-percent', array('pieChart' => $pieChart))
    						@endforeach
					    </div>
				</div>
			</div>
		</div>


	@elseif( Auth::user()->role == "Hiring Manager")

    @else
  <!-- We've got problems -->
	@endif
@endif

@stop
