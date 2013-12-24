@extends('layouts.default')

@section('header')

    @include('partials.components.searchHeader', array('label' => "Opportunities <small>(<em>" . $opportunities->getTotal() ." of $total</em>)</small>", 'url' => URL::route( 'opportunities.index' )))

@stop

@section('content')

<div class="container">
      @if(count($opportunities) > 0)
        @if($search != "")
            <h3>matching <b><i>"{{ $search }}"</b></i>:</h3>
            <a class="btn btn-primary" href="{{ URL::route('opportunities.index') }}">Clear search</a>
        @endif
        <h3>Sort By:</h3>
        <?php
            $pills  = array();
            array_push($pills, new Pill("Title", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'title', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'title', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Company", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'companies.name', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'companies.name', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("City", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'city', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'city', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Date Added", array(
                    new DropdownItem("Oldest first", URL::route( 'opportunities.index', array('sort' => 'created_at', 'order' => 'asc', 'search' => $search))),
                    new DropdownItem("Newest first", URL::route( 'opportunities.index', array('sort' => 'created_at', 'order' => 'desc', 'search' => $search)))
                )));
        ?>
        @include('partials.components.pillDropDowns', array('pills' => $pills))
        @foreach($opportunities as $opportunity)
          @include('partials.indexes.opportunity', array('opportunity' => $opportunity))
        @endforeach
        <div class="row">
            <div class="pull-right">
        {{ $opportunities->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->links(); }}</div>
        </div>
    @else
        <h2>Sorry!</h2>
        <p>There are no opportunities mathing that search. <a class="btn btn-primary" href="{{ URL::route('opportunities.index') }}">View all Opportunities</a></p>
    @endif
</div>

@stop