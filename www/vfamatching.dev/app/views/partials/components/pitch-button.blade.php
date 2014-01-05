@if(Auth::user()->role == "Fellow")
    @if(PlacementStatus::hasPlacementStatus(Auth::user()->profile, $opportunity))
            <h4><em><small><strong>{{ PlacementStatus::getRecentPlacementStatus(Auth::user()->profile, $opportunity)->printWithDate() }}</strong></small></em></h4>
    @elseif(Pitch::hasPitch(Auth::user()->profile, $opportunity))
        <strong>Pitch Status: </strong>{{ Pitch::getPitch(Auth::user()->profile, $opportunity)->status }}
    @else
        <a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-success modal-btn form-control"><i class="fa fa-comment"></i> Pitch</a>
    @endif
	<!-- Modal -->
	<div class="modal" id="pitch-modal-{{ $opportunity->id }}">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
	                <h4 class="modal-title">Pitch for the {{ $opportunity->title }} Opportunity at {{ $opportunity->company->name }}</h4>
	            </div>
	            <div class="modal-body">
	                @if(Auth::user()->role == "Fellow")
	                    @include('partials.forms.pitch', array('fellow_id' => Auth::user()->profile->id, 'opportunity_id' => $opportunity->id))
	                @endif
	            </div>
	            <div class="modal-footer">
	                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
	                <a href="" class="btn btn-primary pitch-submit">Submit</a>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endif