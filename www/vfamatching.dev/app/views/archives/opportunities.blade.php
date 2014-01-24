@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Opportunity Archive", 'results' => $archivedOpportunities->getTotal(), 'total' => $total, 'url' => URL::to( 'archive' ) . "?type=Opportunity", 'type' => 'opportunity'))
@stop

@section('content')
	@include('partials.components.archive-types')
    @include('partials.list', array('listItems' => $archivedOpportunities, 'search' => $search, 'url' => URL::to('archive') . "?type=Opportunity", 'pills' => $pills, 'indexView' => 'partials.indexes.opportunity', 'type' => 'opportunity', 'total' => $total))
@stop