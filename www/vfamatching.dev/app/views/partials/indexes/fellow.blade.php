<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-7">
                    <h3><strong><a href="{{ URL::route('fellows.show', array('fellows'=>$fellow->id)) }}">{{ $fellow->firstName . ' ' . $fellow->lastName }}</a></strong></h3>
                </div>
                <div class="col-md-5">
                    SKILLZ
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" id="fellow-list-bio">
                    <strong>Bio</strong>: 
                    {{ $fellow->bio }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><strong>School: </strong>{{ $fellow->school }}</div>
                <div class="col-md-3"><strong>Major: </strong>{{ $fellow->degree }} in {{ $fellow->major }}</div>
                <div class="col-md-3"><strong>Hometown: </strong>{{ $fellow->hometown }}</div>
                @if(Auth::user()->role == "Admin")
                    <div class="col-md-3">
                        @if( $fellow->isPublished )
                            {{ Form::open(array('url' => 'fellows/'.$fellow->id.'/unpublish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                                <a href="#" class="btn btn-danger form-control publishable"><i class="fa fa-eye-slash"></i> Unpublish</a>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(array('url' => 'fellows/'.$fellow->id.'/publish', 'method' => 'PUT', 'class'=>'publishable-form')) }}
                                <a href="#" class="btn btn-primary form-control publishable"><i class="fa fa-eye"></i> Publish</a>
                            {{ Form::close() }}
                        @endif
                    </div>
                @endif
            </div>
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
});
</script>