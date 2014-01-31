@extends('layouts.default')

@section('header')
Create Password
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('partials.forms.password')
        </div>
    </div>
</div>
@stop
