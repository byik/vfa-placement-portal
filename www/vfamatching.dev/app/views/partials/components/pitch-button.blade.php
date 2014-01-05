@if(Auth::user()->role == "Fellow")
    @if(PlacementStatus::hasPlacementStatus(Auth::user()->profile, $opportunity))
            <h4><em><small><strong>{{ PlacementStatus::getRecentPlacementStatus(Auth::user()->profile, $opportunity)->printWithDate() }}</strong></small></em></h4>
    @elseif(Pitch::hasPitch(Auth::user()->profile, $opportunity))
        <strong>Pitch Status: </strong>{{ Pitch::getPitch(Auth::user()->profile, $opportunity)->status }}
    @else
        <a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-success modal-btn form-control"><i class="fa fa-comment"></i> Pitch</a>
    @endif
@endif