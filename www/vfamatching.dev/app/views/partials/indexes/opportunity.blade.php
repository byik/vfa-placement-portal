<tr>
    <td>@include('partials.links.opportunity', array('opportunity' => $opportunity))</td>
    <td>@include('partials.links.company', array('company' => $opportunity->company))</td>
    <td>{{ $opportunity->city }}</td>
    <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $opportunity->created_at)->diffForHumans(); }}</td>
    @if(Auth::user()->role == "Fellow")
        @if(PlacementStatus::hasPlacementStatus(Auth::user()->profile, $opportunity))
            <td>Placement Status: {{ PlacementStatus::getRecentPlacementStatus(Auth::user()->profile, $opportunity)->printWithDate() }}</td>
        @elseif(Pitch::hasPitch(Auth::user()->profile, $opportunity))
            <td>Pitch Status: {{ Pitch::getPitch(Auth::user()->profile, $opportunity)->status }}</td>
        @else
            <td><a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-primary modal-btn">Pitch</a></td>
        @endif
    @endif
</tr>
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

<script type="text/javascript">
    $('.pitch-submit').unbind().click(function(e){
        $(this).parent().parent().find('.pitch-form').submit();
        e.preventDefault();//don't follow the actual link
    });
</script>