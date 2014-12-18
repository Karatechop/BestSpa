@extends('master')

@section('content')

<br>

@include ('index_navbar')

<br>


<h3>All services:</h3>
@foreach ($services as $service)

@foreach ($service->salon as $salon)
@include ('services_table')
<br><br>
@endforeach

@endforeach

@stop
