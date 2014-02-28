@extends('layouts.default')

@section('header')
    {{ $opportunity->title }}
    <small><em><a href="{{ URL::to('/companies/' . $opportunity->company->id) }}">{{ $opportunity->company->name }},</a> {{ $opportunity->city }}</em></small>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('partials.components.tags', array('tags' => $opportunity->opportunityTags))
            </div>
            <div class="col-md-3">@include('partials.components.pitch-button')</div>
        </div>
        <div class="row">
            <div class="col-md-12">
            	<h4><strong>Opportunity Description</strong></h4>
            	<p>{{ Parser::linkUrlsInText($opportunity->description) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><strong><em>What will be some of the Fellow's initial responsibilities?</em></strong></h4>
            	<p>{{ $opportunity->responsibilitiesAnswer	}}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
            	<h4><strong><em>What are the skills and attributes of a Fellow likely to succeed in this role and at this company?</em></strong></h4>
            	<p>{{ $opportunity->skillsAnswer }}</p>
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                <h4><strong><em>What are some ways the Fellow may develop in this role?</em></strong></h4>
                <p>{{ $opportunity->developmentAnswer }}</p>
            </div>
        </div>
    </div>

    @if(Auth::user()->role == "Admin")
        {{-- Display a Admin waitlisted pitches to admins --}}
        @if(Pitch::where("opportunity_id","=",$opportunity->id)->where("hasAdminApproval","=",false)->count())
        <div class="container">
            <div class="row" id="waitlisted-pitches">
                <div class="col-xs-12">
                    <h3>Waitlisted Pitches:</h3>
                    @foreach(Pitch::where("opportunity_id","=",$opportunity->id)->where("hasAdminApproval","=",false)->where("status","=","Waitlisted")->get() as $pitch)
                        @include('partials.indexes.pitch', array('pitch' => $pitch))
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            @include('partials.components.placementStatuses', array('placementStatuses' => $opportunity->placementStatuses()->where('isRecent','=',true)->get(), 'heading'=>"Candidate Progress"))
        </div>
        @include('partials.components.adminNotes', array('adminNotes' => $opportunity->adminNotes, 'entityType' => "Opportunity", 'entityId' => $opportunity->id))
    @elseif(Auth::user()->role == "Fellow")
        {{-- Commented out due to VFA's request: https://github.com/lowe0292/vfa-placement-portal/issues/16 }}
        {{-- @include('partials.components.fellowNotes', array('fellowNotes' => $opportunity->fellowNotes, 'entityType' => "Opportunity", 'entityId' => $opportunity->id)) --}}
    @elseif(Auth::user()->role == "Hiring Manager")
        {{-- Display company waitlisted pitches to hiring managers --}}
        @foreach(Pitch::where('opportunity_id','=',$opportunity->id)->where("hasAdminApproval","=",true)->where('status','<>', 'Approved')->get() as $pitch)
                <div class="container">
                    <div class="row" id="waitlisted-pitches">
                        <div class="col-xs-12">
                            <h3>Waitlisted Pitches for this Opportunity</h3>
                            @include('partials.indexes.pitch', array('pitch' => $pitch))
                        </div>
                    </div>
                </div>
        @endforeach
        {{-- Display Placement Progress for this opportunity --}}
        <div class="container">
            @include('partials.components.placementStatuses', array('placementStatuses' => $opportunity->placementStatuses()->where('isRecent','=',true)->get(), 'heading'=>"Candidate Progress"))
        </div>
    @endif
@stop