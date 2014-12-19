@extends('master')

@section('content')

<br>

@include ('index_navbar')

<br>
@include ('flash_message')

<h3>All services:</h3>
@foreach ($services as $service)

@include ('services_table')

<br><br>

@endforeach

@stop
