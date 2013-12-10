{{-- Requires: $displayName, $sortName, and $route --}}
<th>
    {{ $displayName }}
    <a href="{{ URL::route( $route, array('sort' => $sortName, 'order' => 'desc', 'search' => $search)) }}"><i class="fa fa-sort-desc"></i></a>
    <a href="{{ URL::route( $route, array('sort' => $sortName, 'order' => 'asc', 'search' => $search)) }}"><i class="fa fa-sort-asc"></i></a>
</th>