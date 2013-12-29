@extends('layouts.default')

@section('header')
    Archive
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4"><a href="{{ URL::to('archive') . '?type=Fellow' }}" class="btn btn-primary form-control">Fellows</a></div>
		<div class="col-sm-4"><a href="{{ URL::to('archive') . '?type=Opportunity' }}" class="btn btn-primary form-control">Opportunities</a></div>
		<div class="col-sm-4"><a href="{{ URL::to('archive') . '?type=Company' }}" class="btn btn-primary form-control">Companies</a></div>
	</div>
</div>
@stop
