@extends('layouts.default')

@section('header')
Fellow Profile
@stop

@section('content')
<h1>{{ $fellow->user->firstName . ' ' . $fellow->user->lastName }}</h1>
TODO: Display full Fellow profile
@stop
