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
            <div class="col-xs-12">
                {{ $listItems->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->addQuery('limit', $limit)->addQuery('type', ucfirst($type))->links(); }}
            </div>
        </div>
        @if($listItems->getTotal() > $limit)
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-inline" role="form" id="pagination-limit">
                        <div class="form-group">
                            {{ ucfirst(str_plural($type)) }} per page: 
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control required requires-int ignore-empty" id="limit" name="limit" value="{{$limit}}">
                            <!-- missing hidden fields -->
                            <?php $queryData = Parser::extractDataFromQueryString($_SERVER['QUERY_STRING']); ?>
                            @foreach($queryData as $name => $value)
                              @include('partials.components.hidden-input', array('name'=>$name, 'value'=>$value))
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-default">Show</button>
                    </form>
                </div>
            </div>
        @endif

    @else
        @if($total == 0)
            @if(isset($type) /*this must be an archive page*/)
                @if($search == "")
                    <h2>Sorry!</h2>
                    <p>There aren't any archived {{ str_plural($type) }} on the Placement Portal right now.</p>
                @else
                    <h2>Sorry!</h2>
                    <p>There are no archived {{ str_plural($type) }} mathing that search. <a class="btn btn-primary" href="{{ $url }}">Clear Search</a></p>
                @endif
            @else
                @if($search == "")
                    <h2>Sorry!</h2>
                    <p>There are no {{ str_plural($type) }} on the Placement Portal right now. Check back soon!</p>
                @else
                    <h2>Sorry!</h2>
                    <p>There are no {{ str_plural($type) }} mathing that search. <a class="btn btn-primary" href="{{ $url }}">Clear Search</a></p>
                @endif
            @endif
        @else
            <h2>Oh No!</h2>
            <p>You landed on an invalid page...</p>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        {{-- TODO: A true solution would strip return the user to page 1 of this list --}}
                        <a href="{{ URL::route('dashboard') }}" class="btn btn-primary">Return to your Dashboard</a>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>