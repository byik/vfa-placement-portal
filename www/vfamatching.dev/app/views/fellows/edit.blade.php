@extends('layouts.default')

@section('header')
    Fellow Profile
@stop

@section('content')
    @if(Auth::user()->id == $fellow->user->id)
        @include('partials.forms.fellow', array('fellow' => $fellow))
    @endif
@stop
