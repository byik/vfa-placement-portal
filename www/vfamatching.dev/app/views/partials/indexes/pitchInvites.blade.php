{{-- Requires $fellow --}}
<div class="pitchInvites">
	<h2><small>Invites to Pitch Opportunities</small></h2>
	@foreach($fellow->pitchInvites as $pitchInvite)
		@include("partials.indexes.pitchInvite", array("pitchInvite" => $pitchInvite))
	@endforeach
</div>