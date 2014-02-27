@extends('layouts.default')

@section('header')
    {{ $heading }}
@stop

@section('content')
    @include('partials.components.table', array('data' => $data))
@stop
