{{-- Requires: $displayName, $sortName, and $route --}}
<th>
    {{ $displayName }}
    <a href="{{ URL::route( $route, array('sort' => $sortName, 'order' => 'desc', 'search' => $search)) }}"><span class="glyphicon glyphicon-chevron-up"></span></a>
    <a href="{{ URL::route( $route, array('sort' => $sortName, 'order' => 'asc', 'search' => $search)) }}"><span class="glyphicon glyphicon-chevron-down"></span></a>
</th>