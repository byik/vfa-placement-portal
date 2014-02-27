{{-- Requires $data --}}
<?php $count = 0; ?>
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				@foreach($data[0] as $columnHeading)
				<th>
					{{ $columnHeading }}
				</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		@foreach($data as $dataRow)
			@if($count != 0 /* skip column headings */)			
					<tr>
						@foreach($dataRow as $dataPoint)
						<td>
							{{ $dataPoint }}
						</td>
						@endforeach
					</tr>
			@endif
			<?php $count++; ?>
		@endforeach
		</tbody>
	</table>
</div>

<script>
$(document).ready(function() 
    { 
        $("table").tablesorter( {sortList: [[1,0], [0,0]]} ); 
    } 
);
</script>