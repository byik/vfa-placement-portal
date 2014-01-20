@extends('layouts.default')

@section('header')
Create New Opportunity
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @include('partials.forms.opportunity')
        </div>
    </div>
</div>
@stop
