@extends('layouts.default')

@section('header')
	<div class="row">
		<div class="col-md-8">{{ $opportunity->title }} <small>{{ $opportunity->city }}</small></div>
		<div class="col-md-4">{{ $opportunity->company->name }} <small><a href="{{ URL::to('/companies/' . $opportunity->company->id) }}"> company profile</a></small></div>
	</div>
@stop

@section('content')
<div class="container">

	<!-- TODO: ADD COMPANY LOGO -->
	

	<h4>Description</h4>
	<p>{{ $opportunity->description }}</p>
	<h4>Responsibilities</h4>
	<p>{{ $opportunity->responsibilitiesAnswer	}}</p>
	<h4>Opportunities for Development</h4>
	<p>{{ $opportunity->developmentAnswer }}</p>
</div>
@stop