@extends('master')

@section('content')

@include ('index_navbar')

<h1>Search results</h1>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($service_results) == 0)
		No results
	@else

@foreach ($service_results as $service)

@include ('services_table')

<br><br>

@endforeach

@endif

<br>
<br>

@stop