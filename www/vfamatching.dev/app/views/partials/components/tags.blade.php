{{-- Requires: $tags --}}
@if(count($tags))
    <ul class="nav nav-pills" class="tag-cloud">
    @foreach($tags as $tag)
        <li><a class="btn" href="{{ URL::route( 'opportunities.index', array('search' => $tag->tag)) }}"><i class="fa fa-tag"></i> {{ $tag->tag }}</a></li>
    @endforeach
    </ul>
@endif