@extends('layouts.default')

@section('header')
	404: {{ $error }}
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				Sorry about that!		
			</div>
		</div>
	</div>
@stop
