@extends('layouts.default')

@section('content')
	<h1>Hello Angular :]</h1>

	<!-- Button trigger modal -->
	<a data-toggle="modal" href="#myModal" class="btn btn-primary btn">Launch demo modal</a>

	<!-- Sample Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		      <h4 class="modal-title">Modal title</h4>
		    </div>
		    <div class="modal-body">
		    	<!-- Sample Chart -->
				<canvas id="myChart"></canvas>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      <button type="button" class="btn btn-primary">Save changes</button>
		    </div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script>
		var data = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					data : [65,59,90,81,56,55,40]
				},
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [28,48,40,19,96,27,100]
				}
			]
		};

		var options = {
				
			//Boolean - If we show the scale above the chart data			
			scaleOverlay : false,
			
			//Boolean - If we want to override with a hard coded scale
			scaleOverride : false,
			
			//** Required if scaleOverride is true **
			//Number - The number of steps in a hard coded scale
			scaleSteps : null,
			//Number - The value jump in the hard coded scale
			scaleStepWidth : null,
			//Number - The scale starting value
			scaleStartValue : null,

			//String - Colour of the scale line	
			scaleLineColor : "rgba(0,0,0,.1)",
			
			//Number - Pixel width of the scale line	
			scaleLineWidth : 1,

			//Boolean - Whether to show labels on the scale	
			scaleShowLabels : true,
			
			//Interpolated JS string - can access value
			scaleLabel : "<%=value%>",
			
			//String - Scale label font declaration for the scale label
			scaleFontFamily : "'Arial'",
			
			//Number - Scale label font size in pixels	
			scaleFontSize : 12,
			
			//String - Scale label font weight style	
			scaleFontStyle : "normal",
			
			//String - Scale label font colour	
			scaleFontColor : "#666",	
			
			///Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines : true,
			
			//String - Colour of the grid lines
			scaleGridLineColor : "rgba(0,0,0,.05)",
			
			//Number - Width of the grid lines
			scaleGridLineWidth : 1,	
			
			//Boolean - Whether the line is curved between points
			bezierCurve : true,
			
			//Boolean - Whether to show a dot for each point
			pointDot : true,
			
			//Number - Radius of each point dot in pixels
			pointDotRadius : 3,
			
			//Number - Pixel width of point dot stroke
			pointDotStrokeWidth : 1,
			
			//Boolean - Whether to show a stroke for datasets
			datasetStroke : true,
			
			//Number - Pixel width of dataset stroke
			datasetStrokeWidth : 2,
			
			//Boolean - Whether to fill the dataset with a colour
			datasetFill : true,
			
			//Boolean - Whether to animate the chart
			animation : true,

			//Number - Number of animation steps
			animationSteps : 60,
			
			//String - Animation easing effect
			animationEasing : "easeOutQuart",

			//Function - Fires when the animation is complete
			onAnimationComplete : null
			
		};

		//Get context with jQuery - using jQuery's .get() method.
		var ctx = $("#myChart").get(0).getContext("2d");
		//This will get the first returned node in the jQuery collection.
		var myNewChart = new Chart(ctx).Line(data,options);
	</script>
@stop
