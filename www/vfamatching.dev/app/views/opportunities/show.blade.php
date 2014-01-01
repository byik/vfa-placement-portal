@extends('layouts.default')

@section('header')
    {{ $opportunity->title }}
    <small><em><a href="{{ URL::to('/companies/' . $opportunity->company->id) }}">{{ $opportunity->company->name }},</a> {{ $opportunity->city }}</em></small>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.components.tags', array('tags' => $opportunity->opportunityTags))
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            	<h4><strong>Opportunity Description</strong></h4>
            	<p>{{ Parser::linkUrlsInText($opportunity->description) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><strong><em>What will the fellow's major daily responsibilities be?</em></strong></h4>
            	<p>{{ $opportunity->responsibilitiesAnswer	}}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><strong><em>What skills are required for this role?</em></strong></h4>
            	<p>{{ $opportunity->skillsAnswer }}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                <h4><strong><em>How will the fellow likely develop in this role?</em></strong></h4>
                <p>{{ $opportunity->developmentAnswer }}</p>
            </div>
        </div>
    </div>

    @if(Auth::user()->role == "Admin")
        @include('partials.components.adminNotes', array('adminNotes' => $opportunity->adminNotes, 'entityType' => "Opportunity", 'entityId' => $opportunity->id))
    @elseif(Auth::user()->role == "Fellow")
        @include('partials.components.fellowNotes', array('fellowNotes' => $opportunity->fellowNotes, 'entityType' => "Opportunity", 'entityId' => $opportunity->id))
    @endif
@stop