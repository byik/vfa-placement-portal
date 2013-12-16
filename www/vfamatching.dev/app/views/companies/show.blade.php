@extends('layouts.default')

@section('header')
{{ $company->name }} <small><em>{{ $company->tagline }}</em></small>
@stop

@section('content')

<!-- TODO: ADD COMPANY LOGO -->

<div class="container">
	<div class="row">
	<div class="col-md-3"><h2 class="text-center"><small>City</small></h2><h3 class="text-center">{{ $company->city }}</h3></div>
	<div class="col-md-3"><h2 class="text-center"><small>Founded</small></h2><h3 class="text-center">{{ $company->yearFounded }}</h3></div>
	<div class="col-md-3"><h2 class="text-center"><small>Employees</small></h2><h3 class="text-center">{{ $company->employees }}</h3></div>
	<div class="col-md-3"><h2 class="text-center"><small>URL</small></h2><h3 class="text-center"><a href="{{ $company->url }}" target="_blank">{{ $company->url }}</a></h3></div>
</div>

<h2><small>Vision</small></h2>
<p>{{ $company->visionAnswer }}</p>
<h2><small>Needs</small></h2>
<p>{{ $company->needsAnswer }}</p>
<h2><small>Team</small></h2>
<p>{{ $company->teamAnswer }}</p>
</div>

<div class="secondary">
	<div class="container">
		<h2>Opportunities</h2>
		<table class="table table-hover">
	      <thead>
	        <tr>
				<th>Title</th>
				<th>Company</th>
				<th>City</th>
				<th>Added On</th>
	        	<th>Status</th>
	        </tr>
	      </thead>
		  <tbody>
		    @foreach($company->opportunities as $opportunity)
		      @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
		    @endforeach
		  </tbody>
		</table>
	</div>
</div>

@stop