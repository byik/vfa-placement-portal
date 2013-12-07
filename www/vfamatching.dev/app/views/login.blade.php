@extends('layouts.default')

@section('header')
Placement Portal Login
@stop

@section('content')

<div id="login" class="well col-md-6 col-md-offset-3">
    {{ Form::open(array('route' => 'login')) }}
        <fieldset>
            <!-- email field -->
            <div class="form-group">
                {{ Form::label('email', 'Email') }}<br/>
                {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
            </div>

            <!-- password field -->
            <div class="form-group">
                {{ Form::label('password', 'Password') }}<br/>
                {{ Form::password('password', array('class'=>'form-control')) }}
            </div>

            <!-- submit button -->
            <p>{{ Form::submit('Login',  array('class'=>'btn btn-primary')) }}</p>
        </fieldset>
    {{ Form::close() }}
</div>

@stop