@extends('layouts.default')

@section('header')
{{ $company->name }} <small><em>{{ $company->tagline }}</em></small>
@stop

@section('content')

<!-- TODO: ADD COMPANY LOGO -->

<div class="container">
	<div class="row" id="highlights">
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>City</small></h2><h3 class="text-center">{{ $company->city }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Founded</small></h2><h3 class="text-center">{{ $company->yearFounded }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Employees</small></h2><h3 class="text-center">{{ $company->employees }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Website</small></h2><h3 class="text-center"><a class="btn btn-primary form-control" href="{{ $company->url }}" target="_blank">Visit <i class="fa fa-external-link"></i></a></h3></div>
    </div>


    <div class="row" id="company-answers">
        <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            <h4><strong>What is your company's vision?</strong></h4>
            <p>{{ $company->visionAnswer }}</p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            <h4><strong>What are your company's greatest needs?</strong></h4>
            <p>{{ $company->needsAnswer }}</p>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            <h4><strong>Describe your team</strong></h4>
            <p>{{ $company->teamAnswer }}</p>
        </div>
    </div>
</div>

<div class="secondary">
	<div class="container">
		<h3>{{ "$company->name's Opportunities <small>(<em>" . count($company->opportunities) ."</em>)</small>" }}</h3>
	    @foreach($company->opportunities as $opportunity)
            @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
	    @endforeach
	</div>
</div>

@if(Auth::user()->role == "Admin")
    @include('partials.components.adminNotes', array('adminNotes' => $company->adminNotes, 'entityType' => "Company", 'entityId' => $company->id))
@elseif(Auth::user()->role == "Fellow")
    @include('partials.components.fellowNotes', array('fellowNotes' => $company->fellowNotes, 'entityType' => "Company", 'entityId' => $company->id))
@endif

@stop