@extends('layouts.default')

@section('header')
    {{ $fellow->user->firstName . ' ' . $fellow->user->lastName }}
    @if(Auth::user()->id == $fellow->user->id)
        <span class="pull-right">
            <small><em><a href="{{ URL::route('fellows.edit', $fellow->id) }}"><i class="fa fa-pencil-square-o"></i>Edit your profile</a></em></small>
        </span>
    @endif
@stop

@section('content')
<div class="container">
    @if(!empty($fellow->displayPicturePath))
    	<img src="{{ $fellow->displayPicturePath }}" class="img-responsive" alt="Responsive image">
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>Interested In</h3>
            <p>@include('partials.components.skills', array('skills' => $fellow->fellowSkills))</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="fellow-list-bio">
            <h3>Bio</h3>
            <p>{{ Parser::linkUrlsInText($fellow->bio) }}</p>
        </div>
        <div class="col-md-12">
            @if(!empty($fellow->resumePath))
                <span class="pull-right">
                    <a class="btn btn-primary form-control" href="{{ $fellow->resumePath }}" target="_blank"><i class="fa fa-cloud-download"></i> Download Résumé</a>
                </span>
            @endif
        </div>
    </div>
    <div class="row" id="highlights">
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h3>School</h3><p>{{ $fellow->school }}</p></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h3>Degree(s)</h3><p>{{ $fellow->degree . " in " . $fellow->major }}</p><p>{{ $fellow->degree2 . " in " . $fellow->major2 }}</p><p>{{ $fellow->degree3 . " in " . $fellow->major3 }}</p></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h3>Hometown</h3><p>{{ $fellow->hometown }}</p></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h3>Graduated</h3><p>{{ $fellow->graduationYear }}</p></div>
    </div>
    @if($fellow->canViewContactInfo())
        <div class="row" id="contact-info">
            <div class="col-xs-10">
                <h3>Contact Info:</h3>
                @include('partials.components.contact-info', array('name' => $fellow->user->firstName . ' ' . $fellow->user->lastName, 'email' => $fellow->user->email, 'phoneNumber' => $fellow->phoneNumber))
            </div>
        </div>
    @endif
</div>

@if(Auth::user()->role == "Admin")
    @include('partials.components.adminNotes', array('adminNotes' => $fellow->adminNotes, 'entityType' => "Fellow", 'entityId' => $fellow->id))
@endif
@stop
