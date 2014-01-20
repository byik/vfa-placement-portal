<div class="row">
    <!-- <div class="col-md-9" id="new-pitches"> -->
    <div class="col-md-12" id="new-pitches">
        <h2>{{ count($newPitches) ? "" : "No "}}New Fellow Pitches 
            @if(count($newPitches))
                <small>(<em> {{ count($newPitches) }}</em>)</small>
            @else
                @if(Auth::user()->role == "Hiring Manager")
                <br/><small>(<em>When fellows are interested in your Opportunities, they'll submit pitches. Those pitches will show up here.</em>)</small>
                @elseif(Auth::user()->role == "Admin")
                <br/><small>(<em>When fellows are interested in Opportunities, they'll submit pitches. Those pitches will show up here.</em>)</small>
                @endif
            @endif
        </h2>
        @foreach($newPitches as $pitch)
            @include('partials.indexes.pitch', array('pitch' => $pitch))
        @endforeach
    </div>
</div>