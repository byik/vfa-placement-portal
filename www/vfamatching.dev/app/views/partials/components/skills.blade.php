{{-- Requires: $skills --}}
@if(count($skills))
    <ul class="nav nav-pills" class="tag-cloud">
    @foreach($skills as $skill)
    	@if(Auth::user()->role != "Fellow")
        	<li><a class="btn" href="{{ URL::route( 'fellows.index', array('search' => $skill->skill)) }}"><i class="fa fa-tag"></i> {{ $skill->skill }}</a></li>
        @else
			<li><a class="btn disabled" href="#"><i class="fa fa-tag"></i> {{ $skill->skill }}</a></li>
        @endif
    @endforeach
    </ul>
@endif