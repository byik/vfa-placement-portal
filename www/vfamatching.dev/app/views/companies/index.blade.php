@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Companies", 'results' => $companies->getTotal(), 'total' => $total, 'url' => URL::route( 'companies.index' )))
@stop

@section('content')
    @include('partials.list', array('listItems' => $companies, 'search' => $search, 'url' => URL::route('companies.index'), 'pills' => $pills, 'indexView' => 'partials.indexes.company', 'type' => 'company'))
@stop
