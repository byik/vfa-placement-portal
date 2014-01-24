@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Company Archive", 'results' => $archivedCompanies->getTotal(), 'total' => $total, 'url' => URL::to( 'archive' ) . "?type=Company", 'type' => 'company'))
@stop

@section('content')
	@include('partials.components.archive-types')
    @include('partials.list', array('listItems' => $archivedCompanies, 'search' => $search, 'url' => URL::to('archive') . "?type=Company", 'pills' => $pills, 'indexView' => 'partials.indexes.company', 'type' => 'company', 'total' => $total))
@stop