{{-- Requires $pitch --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<strong><h3><a href="{{ URL::route('fellows.show', array('fellows'=> $pitch->fellow->id)) }}">{{ $pitch->fellow->user->firstName . ' ' . $pitch->fellow->user->lastName}}</a> <i class="fa fa-arrows-h"></i> @include('partials.links.opportunity', array('opportunity' => $pitch->opportunity))</h3></strong>
        <em>{{ Carbon::createFromFormat('Y-m-d H:i:s', $pitch->created_at)->diffForHumans() }}</em>
	</div>
	<div class="panel-body">
		<p>{{ Parser::linkUrlsInText($pitch->body) }}</p>
	</div>
	<div class="panel-footer">
		<div class="row">
			<span class="pull-right">
				<div class="btn-group actions">
					<button type="button" class="btn btn-success">
						Introduce
					</button>
					<button type="button" class="btn btn-danger">
						Waitlist
					</button>
				</div>
			</span>
		</div>
	</div>
</div>