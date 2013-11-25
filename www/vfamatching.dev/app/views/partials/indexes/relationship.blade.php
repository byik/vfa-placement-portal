<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-1">
				<canvas id="myChart{{ $relationship->id }}" width="100" height="100"></canvas>
				<script type="text/javascript">
					var data = [
					{
						value: {{ $relationship->percent() }},
						color:"#ec5a41"
					},
					{
						value: {{ 1 - $relationship->percent() }},
						color:"#dedede"
					}		
				]

					//Get context with jQuery - using jQuery's .get() method.
					var ctx = $("#myChart{{ $relationship->id }}").get(0).getContext("2d");

					new Chart(ctx).Pie(data);
				</script>
			</div>
		</div>		
	</div>