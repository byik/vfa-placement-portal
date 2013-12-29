{{-- Requires $listItems, $search, $url, $pills, $indexView, $type --}}
<div class="container">
    @if(count($listItems) > 0)
        @if($search != "")
            <h3>matching <b><i>"{{ $search }}"</b></i>:</h3>
            <a class="btn btn-primary" href="{{ $url }}">Clear Search</a>
        @endif
        <h3>Sort By:</h3>
        @include('partials.components.pillDropDowns', array('pills' => $pills))
        <div class="row">
            @foreach($listItems as $listItem)
              @include($indexView, array($type => $listItem))
            @endforeach
        </div>
        <div class="row">
            {{ $listItems->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->addQuery('limit', $limit)->links(); }}
        </div>
        <div class="row">
            <form class="form-inline" role="form">
                <div class="form-group">
                    {{ ucfirst(str_plural($type)) }} per page: 
                </div>
                <div class="form-group">
                    <input type="text" class="form-control required requires-int ignore-empty" id="limit" name="limit" value="{{$limit}}">
                </div>
                <button type="submit" class="btn btn-default">Show</button>
            </form>
        </div>

    @else
        @if($search == "")
            <h2>Sorry!</h2>
            <p>There are no {{ str_plural($type) }} on the Placement Portal right now. Check back soon!</p>
        @else
            <h2>Sorry!</h2>
            <p>There are no {{ str_plural($type) }} mathing that search. <a class="btn btn-primary" href="{{ $url }}">Clear Search</a></p>
        @endif
    @endif
</div>