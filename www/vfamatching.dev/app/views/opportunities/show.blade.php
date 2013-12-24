@extends('layouts.default')

@section('header')
	<div class="row">
		<div class="col-md-8">
            {{ $opportunity->title }}
            <small>{{ $opportunity->city }}</small>
        </div>
		<div class="col-md-4">
            <h3>@include('partials.links.company', array('company' => $opportunity->company))</h3>
        </div>
	</div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<h3><strong>Opportunity Description</strong></h3>
            	<p>{{ $opportunity->description }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><em>What will the fellow's major daily responsibilities be?</em></h4>
            	<p>{{ $opportunity->responsibilitiesAnswer	}}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><em>What skills are required for this role?</em></h4>
            	<p>{{ $opportunity->skillsAnswer }}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                <h4><em>How will the fellow likely develop in this role?</em></h4>
                <p>{{ $opportunity->developmentAnswer }}</p>
            </div>
        </div>
    </div>
@stop