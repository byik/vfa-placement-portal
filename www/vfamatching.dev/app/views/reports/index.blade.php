@extends('layouts.default')

@section('header')
    Reports
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4"><a href="{{ URL::to('reports') . '/fellows' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Unplaced Fellows</a></div>
			<div class="col-md-4"><a href="{{ URL::to('reports') . '/companies' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Unfilled Opportunities</a></div>
			<div class="col-md-4"><a href="{{ URL::to('reports') . '/placementStatuses' }}" class="btn btn-primary form-control"><i class="fa fa-tachometer"></i> Recent Placement Status Updates</a></div>
		</div>
	</div>
@stop
