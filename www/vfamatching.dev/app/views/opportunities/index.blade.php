@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => Auth::user()->role == "Hiring Manager" ? Auth::user()->profile->company->name . "'s Opportunities" : "Opportunities", 'results' => $opportunities->getTotal(), 'total' => $total, 'url' => URL::route( 'opportunities.index' ), 'type' => 'opportunity'))
@stop

@section('content')
	@if(Auth::user()->role == "Hiring Manager")
		@include('partials.components.add-button', array('url'=>'/opportunities/create', 'name' => 'Opportunity'))
	@endif
    @include('partials.list', array('listItems' => $opportunities, 'search' => $search, 'url' => URL::route('opportunities.index'), 'pills' => $pills, 'indexView' => 'partials.indexes.opportunity', 'type' => 'opportunity', 'total' => $total))
@stop