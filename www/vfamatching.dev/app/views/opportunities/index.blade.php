@extends('layouts.default')

@section('header')
Opportunities
@stop

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th>Status</th>
      <th>Title</th>
      <th>Company</th>
      <th>City</th>
      <th class="hidden-xs">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($opportunities as $opportunity)
      @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
    @endforeach
  </tbody>
</table>
{{ $opportunities->links(); }}
@stop