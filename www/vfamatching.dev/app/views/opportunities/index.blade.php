@extends('layouts.default')

@section('header')
Opportunities
@stop

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th>Status</th>
      @include('partials.sort-filter-table-header', array('displayName' => "Title", 'sortName' => "title", 'route' => 'opportunities.index'))
      @include('partials.sort-filter-table-header', array('displayName' => "Company", 'sortName' => "companies.name", 'route' => 'opportunities.index'))
      @include('partials.sort-filter-table-header', array('displayName' => "City", 'sortName' => "city", 'route' => 'opportunities.index'))
      @include('partials.sort-filter-table-header', array('displayName' => "Added On", 'sortName' => "created_at", 'route' => 'opportunities.index'))
    </tr>
  </thead>
  <tbody>
    @foreach($opportunities as $opportunity)
      @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
    @endforeach
  </tbody>
</table>
{{ $opportunities->addQuery('order', $order)->addQuery('sort', $sort)->links(); }}
@stop