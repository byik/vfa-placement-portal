{{-- Reguires $placedFellowPercent, $placementProgressHistogram--}}
<div class="container">
    <div class="row">
        <!-- Include pie chart of fellows complete -->
        <div class="col-md-3 chart hidden-sm hidden-xs">
            <h2>Fellows Placed</h2>
            @include('partials.charts.pie-percent', array('percent' => $placedFellowPercent))
            <h3><em>( {{ round($placedFellowPercent, 2) * 100 . '%' }})</em></h3>
        </div>
        <div class="col-xs-12 visible-sm visible-xs">
            <h2 id="admin-dashboard-highlight">Fellows Placed: <strong>{{ round($placedFellowPercent, 2) * 100 . '%' }}</strong></h2>
        </div>
        <!-- Include histogram of fellow progress -->
        <div class="col-md-9 chart hidden-sm hidden-xs">
            <h2>Fellow Progress</h2>
            @include('partials.charts.histogram', array('data' => $placementProgressHistogram))
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-md-9" id="new-pitches"> -->
        <div class="col-md-12" id="new-pitches">
            <h2>{{ count($newPitches) ? "" : "No "}}New Fellow Pitches 
                @if(count($newPitches))
                    <small>(<em> {{ count($newPitches) }}</em>)</small>
                @endif
            </h2>
            @foreach($newPitches as $pitch)
                @include('partials.indexes.pitch', array('pitch' => $pitch))
            @endforeach
        </div>
        <!-- <div class="col-md-3">
            <h2>Accepted Offers</h2>
        </div> -->
    </div>
</div>