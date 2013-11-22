@extends('layouts.default')

@section('header')
Dashboard
@stop

@section('content')
<div class="fellow-dash">
	<div class="container">
		<h2><small>Upcoming Events<small></h2>
		<ul>
			<li><span class="glyphicon glyphicon-phone"></span><span class="red"> March 23, 6:00pm</span>   Phone interview with Chalkfly</li>
			<li><span class="glyphicon glyphicon-user"></span><span class="red"> April 8, 2:00pm</span>   In person interview with Teespring</li>
			<li><span class="glyphicon glyphicon-user"></span><span class="red"> April 12, 3:00pm</span>  In person interview with Swipely</li>
			<li><span class="glyphicon glyphicon-thumbs-up"></span><span class="red"> April 17, 5:00pm</span>  VCharge offer acceptance deadline</li>
		</ul>
		<h2><small>Relationships</small></h2>
	</div>
</div>


<canvas id="myChart" width="400" height="400"></canvas>

<script type="text/javascript">
	var data = [
	{
		value: 30,
		color:"#F38630"
	}		
]

	//Get context with jQuery - using jQuery's .get() method.
	var ctx = $("#myChart").get(0).getContext("2d");
	//This will get the first returned node in the jQuery collection.
	new Chart(ctx).Pie(data);
</script>

@stop
