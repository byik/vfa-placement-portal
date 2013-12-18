@extends('layouts.default')

@section('header')
    Fellow Profile
@stop

@section('content')
<div class="container">
	@if(Auth::user()->id == $fellow->user->id)
        <a href="{{ URL::route('fellows.edit', $fellow->id) }}">Edit your profile &raquo;</a>
    @endif
    <h1>{{ $fellow->user->firstName . ' ' . $fellow->user->lastName }}</h1>
    @if(!empty($fellow->displayPicturePath))
    	<img src="{{ $fellow->displayPicturePath }}" class="img-responsive" alt="Responsive image">
    @endif
</div>
@stop
