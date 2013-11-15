@extends('layouts.default')

@section('header')
Company
@stop

@section('content')
<h1>{{ $company->name }}</h1>
@stop