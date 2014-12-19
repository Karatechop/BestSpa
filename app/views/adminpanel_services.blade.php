@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_services_navbar')


@include ('flash_message')

<h2>Services</h2>

<a href="/adminpanel/services/create" class="btn btn-primary">Add a new service</a>

<h3>All services data:</h3>

@foreach ($salon_names as $key=> $value)
{{ "<strong>".$value." services: </strong>" }} <br>
@foreach ($services as $service)

@if ($service->salon->name == $value)

@include ('services_table')
@include ('services_table_buttons')
<br><br>

@endif

@endforeach

@endforeach

@stop
