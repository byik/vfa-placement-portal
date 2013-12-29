<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>@include('partials.links.company', array('company' => $company))</h3>
            <h4><small><strong><em>{{ $company->tagline }}</em></strong></small></h4>
        </div>
        <div class="panel-body">
            <div class="row list-summary">
                <div class="col-md-3"><strong>City: </strong>{{ $company->city }}</div>
                <div class="col-md-3"><strong>Founded: </strong>{{ $company->yearFounded }}</div>
                <div class="col-md-3"><strong>Employees: </strong>{{ $company->employees }}</div>
                <div class="col-md-3"><strong>Date Added: </strong>{{ Carbon::createFromFormat('Y-m-d H:i:s', $company->created_at)->diffForHumans(); }}</div>
            </div>
            @if(Auth::user()->role == "Admin")
                <div class="pull-right admin-controls">
                    @if( $company->isPublished )
                        {{ Form::open(array('url' => 'companies/'.$company->id.'/unpublish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                            <a href="#" class="btn btn-danger form-control verify-submit"><i class="fa fa-eye-slash"></i> Unpublish</a>
                        {{ Form::close() }}
                    @else
                        {{ Form::open(array('url' => 'companies/'.$company->id.'/publish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                            <a href="#" class="btn btn-danger form-control publishable"><i class="fa fa-eye"></i> Publish</a>
                        {{ Form::close() }}
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {  
    //unbind so the click only fires once
    $('.publishable').unbind().click(function(e){
        $(this).parent('.publishable-form').submit();
        e.preventDefault();//don't follow the actual link
    });

    $('.verify-submit').unbind().click(function(e){
        publishableForm = $(this).parent('.publishable-form');        
        noty({
          text: 'Unpublishing a Company will unpublish all associated Opportunities. Do you want to continue?',
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