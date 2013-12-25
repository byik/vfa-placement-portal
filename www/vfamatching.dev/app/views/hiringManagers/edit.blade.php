@extends('layouts.default')

@section('header')
Edit Hiring Manager Profile
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('partials.forms.hiringManager', array('hiringManager' => $hiringManager))
        </div>
    </div>
</div>
@stop
