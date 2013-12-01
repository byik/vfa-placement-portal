@extends('layouts.default')

@section('header')
Opportunities
@stop

@section('content')
<form class="navbar-form" role="search" method="get" action="{{ URL::route( 'opportunities.index' ) }}">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search" id="search">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</form>
@if($search != "")
    <h2>Opportunities matching <b><i>"{{ $search }}"</b></i></h2>
@endif
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
{{ $opportunities->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->links(); }}
@stop