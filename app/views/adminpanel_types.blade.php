@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_types_navbar')

@include ('flash_message')

<h2>Types of service</h2>

<a href="/adminpanel/types/create" class="btn btn-primary">Add a new service type</a>
<br>

{{ "<strong> All service types: </strong>" }} <br>
@foreach ($types as $type)

@include ('types_table')
@include ('types_table_buttons')

@endforeach

<br>
<br>

@stop
