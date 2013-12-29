@extends('layouts.default')

@section('header')
Add User
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('partials.forms.user')
        </div>
    </div>
</div>
@stop
