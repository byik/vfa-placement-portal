@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Fellows", 'results' => $fellows->getTotal(), 'total' => $total, 'url' => URL::route( 'fellows.index' )))
@stop

@section('content')
    @include('partials.list', array('listItems' => $fellows, 'search' => $search, 'url' => URL::route('fellows.index'), 'pills' => $pills, 'indexView' => 'partials.indexes.fellow', 'type' => 'fellow'))
@stop