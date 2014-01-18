@extends('layouts.default')

@section('header')
{{ $company->name }} <small><em>{{ $company->twitterPitch }}</em></small>
    @if(Auth::user()->role == "Hiring Manager")
        @if(Auth::user()->profile->company->id == $company->id)
            <span class="pull-right">
                <small><em><a href="{{ URL::route('companies.edit', $company->id) }}"><i class="fa fa-pencil-square-o"></i>Edit your Company profile</a></em></small>
            </span>
        @endif
    @endif
@stop

@section('content')

<!-- TODO: ADD COMPANY LOGO -->

<div class="container">
	<div class="row" id="highlights">
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>City</small></h2><h3 class="text-center">{{ $company->city }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Founded</small></h2><h3 class="text-center">{{ $company->yearFounded }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Employees</small></h2><h3 class="text-center">{{ $company->employees }}</h3></div>
    	<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Website</small></h2><h3 class="text-center"><a class="btn btn-link form-control" href="{{ $company->url }}" target="_blank">Visit <i class="fa fa-external-link"></i></a></h3></div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h4><strong>About {{ $company->name }}</strong></h4>
            <p>{{ Parser::linkUrlsInText($company->bio) }}</p>
        </div>
        <div class="col-md-4 ">
            <h4><strong>About Chalkfly's Team</strong></h4>
            <p>{{ $company->teamAnswer }}</p>
        </div>
    </div>
</div>

@if(Auth::user()->role != "Hiring Manager")
    <div class="secondary">
    	<div class="container">
    		<h3>{{ "$company->name's Opportunities <small>(<em>" . count($company->opportunities) ."</em>)</small>" }}</h3>
    	    @foreach($company->opportunities as $opportunity)
                @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
    	    @endforeach
    	</div>
    </div>
@endif

@if(Auth::user()->role == "Admin")
    @include('partials.components.adminNotes', array('adminNotes' => $company->adminNotes, 'entityType' => "Company", 'entityId' => $company->id))
@elseif(Auth::user()->role == "Fellow")
    {{-- Commented out due to VFA's request: https://github.com/lowe0292/vfa-placement-portal/issues/16 }}
    {{-- @include('partials.components.fellowNotes', array('fellowNotes' => $company->fellowNotes, 'entityType' => "Company", 'entityId' => $company->id)) --}}
@endif

@stop