@extends('master')

@section('content')

@include ('adminpanel_salons_navbar')

@include ('flash_message')

<h1>Search results</h1>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($salon_results) == 0)
		No results
	@else

{{ "<strong> Your results: </strong>" }} <br>

@foreach ($salon_results as $salon)

@include ('salons_table')

@endforeach

@endif

<br>
<br>

@stop