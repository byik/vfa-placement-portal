@extends('layouts.default')

@section('header')
    {{ $fellow->user->firstName . ' ' . $fellow->user->lastName }}
    @if(Auth::user()->id == $fellow->user->id)
        <small><em><a href="{{ URL::route('fellows.edit', $fellow->id) }}"><i class="fa fa-pencil-square-o"></i>Edit your profile</a></em></small>
    @endif
@stop

@section('content')
<div class="container">
    @if(!empty($fellow->displayPicturePath))
    	<img src="{{ $fellow->displayPicturePath }}" class="img-responsive" alt="Responsive image">
    @endif
    <div class="row">
        @include('partials.components.skills', array('skills' => $fellow->fellowSkills))
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
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>School</small></h2><h3 class="text-center">{{ $fellow->school }}</h3></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Major</small></h2><h3 class="text-center">{{ $fellow->degree . " in " . $fellow->major }}</h3></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Hometown</small></h2><h3 class="text-center">{{ $fellow->hometown }}</h3></div>
        <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"><h2 class="text-center"><small>Graduated</small></h2><h3 class="text-center">{{ $fellow->graduationYear }}</h3></div>
    </div>
</div>

@if(Auth::user()->role == "Admin")
    @include('partials.components.adminNotes', array('adminNotes' => $fellow->adminNotes, 'entityType' => "Fellow", 'entityId' => $fellow->id))
@endif
@stop
