@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Fellow Archive", 'results' => $archivedFellows->getTotal(), 'total' => $total, 'url' => URL::to( 'archive' ) . "?type=Fellow", 'type' => 'fellow'))
@stop

@section('content')
	@include('partials.components.archive-types')
    @include('partials.list', array('listItems' => $archivedFellows, 'search' => $search, 'url' => URL::to('archive') . "?type=Fellow", 'pills' => $pills, 'indexView' => 'partials.indexes.fellow', 'type' => 'fellow', 'total' => $total))
@stop