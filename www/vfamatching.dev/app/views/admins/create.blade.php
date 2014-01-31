@extends('layouts.default')

@section('header')
Create Fellow Profile
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
