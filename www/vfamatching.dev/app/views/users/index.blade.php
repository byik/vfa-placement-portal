@extends('layouts.default')

@section('header')

    @include('partials.components.searchHeader', array('label' => "Users <small>(<em>" . $users->getTotal() ." of $total</em>)</small>", 'url' => URL::route( 'users.index' )))

@stop

@section('content')

<div class="container">
      @if(count($users) > 0)
        @if($search != "")
            <h3>matching <b><i>"{{ $search }}"</b></i>:</h3>
            <a class="btn btn-primary" href="{{ URL::route('users.index') }}">Clear search</a>
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
        <div class="row">
            @foreach($users as $user)
              @include('partials.indexes.user', array('user' => $user))
            @endforeach
        </div>
        <div class="row">
        {{ $users->addQuery('order', $order)->addQuery('sort', $sort)->addQuery('search', $search)->links(); }}
        </div>
    @else
        <h2>Sorry!</h2>
        <p>There are no users mathing that search. <a class="btn btn-primary" href="{{ URL::route('users.index') }}">View all Users</a></p>
    @endif
</div>

@stop