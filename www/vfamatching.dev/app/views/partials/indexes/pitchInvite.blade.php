{{-- Requires $pitchInvite --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>
			<strong>
			@include('partials.links.opportunity', array('opportunity' => $pitchInvite->opportunity)) at 
			@include('partials.links.company', array('company' => $pitchInvite->opportunity->company))
     		</strong>
 		</h3>
        <em>{{ Carbon::createFromFormat('Y-m-d H:i:s', $pitchInvite->created_at)->diffForHumans() }}</em>
	</div>
	<div class="panel-body">
		<p>{{ $pitchInvite->opportunity->teaser }}</p>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
				@include('partials.components.pitch-button', array('opportunity' => $pitchInvite->opportunity))
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('.pitch-submit').unbind().click(function(e){
        $(this).parent().parent().find('.pitch-form').submit();
        e.preventDefault();//don't follow the actual link
    });
</script>