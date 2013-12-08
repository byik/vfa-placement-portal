@extends('layouts.default')

@section('header')
    Fellow Profile
@stop

@section('content')
    @if(Auth::user()->id == $fellow->user->id)
        <a href="{{ URL::route('fellows.edit', $fellow->user->id) }}">Edit your profile &raquo;</a>
    @endif
    <h1>{{ $fellow->user->firstName . ' ' . $fellow->user->lastName }}</h1>
    TODO: Display full Fellow profile
@stop
