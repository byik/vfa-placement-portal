{{-- Requires $listItems, $search, $url, $pills, $indexView, $type --}}
<div class="container">
      @if(count($listItems) > 0)
        @if($search != "")
            <h3>matching <b><i>"{{ $search }}"</b></i>:</h3>
            <a class="btn btn-primary" href="{{ $url }}">Clear search</a>
        @endif
        <h3>Sort By:</h3>
        @include('partials.components.pillDropDowns', array('pills' => $pills))
        <div class="row">
            @foreach($listItems as $listItem)
              @include($indexView, array($type => $listItem))
            @endforeach
        </div>
        <div class="row">
        {{ $listItems->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->links(); }}
        </div>
    @else
        <h2>Sorry!</h2>
        <p>There are no {{ str_plural($type) }} mathing that search. <a class="btn btn-primary" href="{{ $url }}">View all {{ ucfirst(str_plural($type)) }}</a></p>
    @endif
</div>