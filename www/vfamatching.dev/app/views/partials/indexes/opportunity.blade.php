<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-7">
                    <h3>@include('partials.links.opportunity', array('opportunity' => $opportunity))</h3>
                    <h4><small><strong><em>{{ $opportunity->teaser }}</em></strong></small></h4>
                </div>
                <div class="col-md-5">
                    @include('partials.components.tags', array('tags' => $opportunity->opportunityTags))
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row list-summary">
                <div class="col-md-3"><h4>@include('partials.links.company', array('company' => $opportunity->company))</h4></div>
                <div class="col-md-3"><strong>City: </strong>{{ $opportunity->city }}</div>
                <div class="col-md-3"><strong>Date Added: </strong>{{ Carbon::createFromFormat('Y-m-d H:i:s', $opportunity->created_at)->diffForHumans(); }}</div>
                @if(Auth::user()->role == "Fellow")
                    @if(PlacementStatus::hasPlacementStatus(Auth::user()->profile, $opportunity))
                        <div class="col-md-3">
                            <h4><em><small><strong>{{ PlacementStatus::getRecentPlacementStatus(Auth::user()->profile, $opportunity)->printWithDate() }}</strong></small></em></h4>
                        </div>
                    @elseif(Pitch::hasPitch(Auth::user()->profile, $opportunity))
                        <div class="col-md-3"><strong>Pitch Status: </strong>{{ Pitch::getPitch(Auth::user()->profile, $opportunity)->status }}</div>
                    @else
                        <div class="col-md-3"><a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-primary modal-btn form-control"><i class="fa fa-comment"></i> Pitch</a></div>
                    @endif
                @endif
            </div>
            @if(Auth::user()->role == "Admin" || Auth::user()->role == "Hiring Manager")
                <div class="pull-right admin-controls">
                    @if( $opportunity->isPublished )
                        {{ Form::open(array('url' => 'opportunities/'.$opportunity->id.'/unpublish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                            <a href="#" class="btn btn-danger form-control verify-submit"><i class="fa fa-eye-slash"></i> Unpublish</a>
                        {{ Form::close() }}
                    @else
                        {{ Form::open(array('url' => 'opportunities/'.$opportunity->id.'/publish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                            <a href="#" class="btn btn-danger form-control publishable"><i class="fa fa-eye"></i> Publish</a>
                        {{ Form::close() }}
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@if(Auth::user()->role == "Fellow")
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
<script type="text/javascript">
    $('.pitch-submit').unbind().click(function(e){
        $(this).parent().parent().find('.pitch-form').submit();
        e.preventDefault();//don't follow the actual link
    });

    $(document).ready(function() {  
        //unbind so the click only fires once
        $('.publishable').unbind().click(function(e){
            $(this).parent('.publishable-form').submit();
            e.preventDefault();//don't follow the actual link
        });

        $('.verify-submit').unbind().click(function(e){
            publishableForm = $(this).parent('.publishable-form');        
            noty({
              text: 'Fellows will no longer be able to view this Opportunity if you unpublish it. Would you like to continue?',
              buttons: [
                {addClass: 'btn btn-danger', text: '<i class="fa fa-eye-slash"></i> Unpublish', onClick: function($noty) {
                    publishableForm.submit();
                    e.preventDefault();//don't follow the actual link
                    $noty.close();
                  }
                },
                {addClass: 'btn btn-default', text: 'Cancel', onClick: function($noty) {
                    $noty.close();
                  }
                }
              ]
            });
        });
    });
</script>