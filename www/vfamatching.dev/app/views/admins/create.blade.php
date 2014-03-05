@extends('layouts.default')

@section('header')
Create Admin Profile
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('partials.forms.admin')
        </div>
    </div>
</div>
@stop
