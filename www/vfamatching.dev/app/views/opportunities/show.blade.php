@extends('layouts.default')

@section('header')
Opportunity
@stop

@section('content')
<div class="container">

	<!-- TODO: ADD COMPANY LOGO -->
	
	<div class="row">
		<div class="col-md-8"><h1>{{ $opportunity->title }} <small>{{ $opportunity->city }}</small></h1></div>
		<div class="col-md-4"><h2><a href="{{ URL::to('/companies/' . $opportunity->company->id) }}">{{ $opportunity->company->name }}</a></h2></div>
	</div>
	<h4>Description</h4>
	<p>{{ $opportunity->description }}</p>
	<h4>Responsibilities</h4>
	<p>{{ $opportunity->responsibilitiesAnswer	}}</p>
	<h4>Opportunities for Development</h4>
	<p>{{ $opportunity->developmentAnswer }}</p>
</div>
@stop