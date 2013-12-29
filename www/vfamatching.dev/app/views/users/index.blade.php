@extends('layouts.default')

@section('header')
    @include('partials.components.searchHeader', array('title' => "Users", 'results' => $users->getTotal(), 'total' => $total, 'url' => URL::route( 'users.index' )))
@stop

@section('content')
    @include('partials.list', array('listItems' => $users, 'search' => $search, 'url' => URL::route('users.index'), 'pills' => $pills, 'indexView' => 'partials.indexes.user', 'type' => 'user', 'total' => $total))
@stop