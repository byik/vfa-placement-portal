@extends('layouts.default')

@section('header')
    Fellow Profile
@stop

@section('content')
    @if(Auth::user()->id == $fellow->user->id)
    	<div class="row">
    		<div class="col-md-6">
        		@include('partials.forms.fellow', array('fellow' => $fellow))
    		</div>
    	</div>
    @endif
@stop
