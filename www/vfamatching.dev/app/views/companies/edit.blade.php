@extends('layouts.default')

@section('header')
    Company Profile
@stop

@section('content')
    	<div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('partials.forms.company', array('company' => $company))
                </div>
            </div>   
        </div>
@stop
