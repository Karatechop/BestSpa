@extends('master')

@section('content')

@include ('adminpanel_types_navbar')

@include ('flash_message')

<h1>Search results</h1>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($type_results) == 0)
		No results
	@else

{{ "<strong> Your results: </strong>" }} <br>

@foreach ($type_results as $type)

@include ('types_table')
@include ('types_table_buttons')

@endforeach

@endif

<br>
<br>

@stop