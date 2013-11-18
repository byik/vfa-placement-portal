@extends('layouts.default')

@section('header')
Opportunities
@stop

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>Title</th>
      <th>Company</th>
      <th>Description</th>
      <th>Pitch</th>
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