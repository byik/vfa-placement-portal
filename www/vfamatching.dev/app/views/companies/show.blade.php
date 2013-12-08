@extends('layouts.default')

@section('header')
Company
@stop

@section('content')

<!-- TODO: ADD COMPANY LOGO -->

<h1><a href="{{ $company->url }}" target="_blank">{{ $company->name }}</a><small> <em>{{ $company->tagline }}</em></small></h1>

<div class="row">
	<div class="col-md-4"><h3 class="text-center">City</h3><p class="text-center">{{ $company->city }}</p></div>
	<div class="col-md-4"><h3 class="text-center">Founded</h3><p class="text-center">{{ $company->yearFounded }}</div>
	<div class="col-md-4"><h3 class="text-center">Employees</h3><p class="text-center">{{ $company->employees }}</div>
</div>

<h4>Vision</h4>
<p>{{ $company->visionAnswer }}</p>
<h4>Needs</h4>
<p>{{ $company->needsAnswer }}</p>
<h4>Team</h4>
<p>{{ $company->teamAnswer }}</p>

<h3>Opportunities</h3>
@foreach($company->opportunities as $opportunity)
  <p>{{ $opportunity->title }}</p>
@endforeach

@stop