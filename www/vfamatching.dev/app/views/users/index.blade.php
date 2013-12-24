@extends('layouts.default')

@section('header')

    @include('partials.components.searchHeader', array('label' => "Opportunities", 'url' => URL::route( 'users.index' )))

@stop

@section('content')

<div class="container">
      @if(count($users) > 0)
        @if($search != "")
            <h3>Users matching <b><i>"{{ $search }}"</b></i>:</h3>
            <a href="{{ URL::route('users.index') }}">Clear search</a>
        @endif
        <h3>Sort By:</h3>
        <?php
            $pills  = array();
            array_push($pills, new Pill("Email", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'email', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'email', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Role", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'role', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'role', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("First Name", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'firstName', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'firstName', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Last Name", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'lastName', 'order' => 'asc', 'search' => $search)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'lastName', 'order' => 'desc', 'search' => $search)), "sort-alpha-desc")
                )));
        ?>
        @include('partials.components.pillDropDowns', array('pills' => $pills))
        @foreach($users as $user)
          @include('partials.indexes.user', array('user' => $user))
        @endforeach
        <div class="row">
            <div class="pull-right">
        {{ $users->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->links(); }}</div>
        </div>
    @else
        <h2>Sorry!</h2>
        <p>There are no opportunities mathing that criteria. <a href="{{ URL::route('opportunities.index') }}">View all Opportunities</a></p>
    @endif
</div>

@stop