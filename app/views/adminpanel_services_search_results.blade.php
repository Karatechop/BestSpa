@extends('master')

@section('content')

@include ('adminpanel_services_navbar')

@include ('flash_message')

<h2>Services</h2>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($service_results) == 0)
		No results
	@else


@foreach ($service_results as $service)

@include ('services_table')
@include ('services_table_buttons')
<br><br>

@endforeach

@endif
<br>
<br>

@stop