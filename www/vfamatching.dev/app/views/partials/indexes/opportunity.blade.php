<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8">
                    <h3>@include('partials.links.opportunity', array('opportunity' => $opportunity))</h3>
                    <h4><small><strong><em>{{ $opportunity->teaser }}</em></strong></small></h4>
                </div>
                <div class="col-md-4">
                    @include('partials.components.tags', array('tags' => $opportunity->opportunityTags))
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-3"><strong>Company: </strong>@include('partials.links.company', array('company' => $opportunity->company))</div>
            <div class="col-md-3"><strong>City: </strong>{{ $opportunity->city }}</div>
            <div class="col-md-3"><strong>Date Added: </strong>{{ Carbon::createFromFormat('Y-m-d H:i:s', $opportunity->created_at)->diffForHumans(); }}</div>
            @if(Auth::user()->role == "Fellow")
                @if(PlacementStatus::hasPlacementStatus(Auth::user()->profile, $opportunity))
                    <div class="col-md-3"><strong>Placement Status: </strong>{{ PlacementStatus::getRecentPlacementStatus(Auth::user()->profile, $opportunity)->printWithDate() }}</div>
                @elseif(Pitch::hasPitch(Auth::user()->profile, $opportunity))
                    <div class="col-md-3"><strong>Pitch Status: </strong>{{ Pitch::getPitch(Auth::user()->profile, $opportunity)->status }}</div>
                @else
                    <div class="col-md-3"><a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-primary modal-btn form-control"><i class="fa fa-comment"></i> Pitch</a></div>
                @endif
            @endif
        </div>
    </div>
</div>
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