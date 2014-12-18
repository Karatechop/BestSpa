@extends('master')

@section('content')

@include ('adminpanel_services_navbar')

<h2>Services</h2>

<a href="/adminpanel/services/create" class="btn btn-primary">Add a new service</a>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($service_results) == 0)
		No results
	@else


@foreach ($service_results as $service)
@foreach ($service->salon as $salon)
@include ('services_table')<br><br>
@endforeach
@endforeach

@endif
<br>
<br>

@stop