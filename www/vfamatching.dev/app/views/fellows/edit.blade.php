@extends('layouts.default')

@section('header')
    Fellow Profile
@stop

@section('content')
    @if(Auth::user()->id == $fellow->user->id)
    	<div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('partials.forms.fellow', array('fellow' => $fellow))
                </div>
            </div>   
        </div>
    @endif
@stop
