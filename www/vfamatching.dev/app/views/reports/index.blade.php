@extends('layouts.default')

@section('header')
    Reports
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-3"><a href="{{ URL::to('reports') . '/fellows' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Published Fellows</a></div>
			<div class="col-sm-3"><a href="{{ URL::to('reports') . '/companies' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Published Companies</a></div>
			<div class="col-sm-3"><a href="{{ URL::to('reports') . '/placementStatuses' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Recent Placement Statuses</a></div>
			<div class="col-sm-3"><a href="{{ URL::to('reports') . '/custom' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Custom</a></div>
		</div>
	</div>
@stop
