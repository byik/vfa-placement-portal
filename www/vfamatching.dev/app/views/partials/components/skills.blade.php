{{-- Requires: $skills --}}
@if(count($skills))
    <ul class="nav nav-pills" class="tag-cloud">
    @foreach($skills as $skill)
        <li><a class="btn" href="{{ URL::route( 'fellows.index', array('search' => $skill->skill)) }}"><i class="fa fa-tag"></i> {{ $skill->skill }}</a></li>
    @endforeach
    </ul>
@endif