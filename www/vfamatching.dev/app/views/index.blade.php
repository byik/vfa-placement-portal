@extends('layouts.default')

@section('header')
    @if( Auth::user()->role == "Admin" )
        Admin Dashboard
    @elseif( Auth::user()->role == "Fellow") {{-- Fellow's Dashboard --}}
        Fellow Dashboard
    @elseif( Auth::user()->role == "Hiring Manager")
        Hiring Manager Dashboard
    @else
  <!-- We've got problems -->
    @endif
@stop

@section('content')

@if( Auth::check() )

	@if( Auth::user()->role == "Admin" )
		@include('partials.dashboards.admin', array('placedFellowPercent' => $placedFellowPercent))
	@elseif( Auth::user()->role == "Fellow") {{-- Fellow's Dashboard --}}
		@include('partials.dashboards.fellow', array('placementStatuses' => $placementStatuses))
	@elseif( Auth::user()->role == "Hiring Manager")

    @else
  <!-- We've got problems -->
	@endif
@endif

@stop
