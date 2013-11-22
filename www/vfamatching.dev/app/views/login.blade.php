@extends('layouts.default')

@section('header')
Login
@stop

@section('content')

    {{ Form::open(array('route' => 'login')) }}

    <!-- email field -->
    <p>
        {{ Form::label('email', 'Email') }}<br/>
        {{ Form::text('email', Input::old('email')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>

    <!-- submit button -->
    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
@stop