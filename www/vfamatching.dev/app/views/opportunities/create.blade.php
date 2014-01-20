@extends('layouts.default')

@section('header')
Create New Opportunity
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        	@if(Auth::user()->role == "Hiring Manager")
            	@include('partials.forms.opportunity', array('company' => Auth::user()->profile->company))
            @else
				Currently, only Hiring Managers can create new Opportunities
            @endif
        </div>
    </div>
</div>
@stop
