@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Opportunities", 'results' => $opportunities->getTotal(), 'total' => $total, 'url' => URL::route( 'opportunities.index' )))
@stop

@section('content')
    @include('partials.list', array('listItems' => $opportunities, 'search' => $search, 'url' => URL::route('opportunities.index'), 'pills' => $pills, 'indexView' => 'partials.indexes.opportunity', 'type' => 'opportunity', 'total' => $total))
@stop