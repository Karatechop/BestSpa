@extends('master')

@section('content')

@include ('index_navbar')

<h1>index search results</h1>

@if($query)
		<h2>You searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($service_results) == 0)
		No results
	@else

{{ "<strong> Your results: </strong>" }} <br>
@foreach ($service_results as $service)
@foreach ($service->salon as $salon)
{{$salon->name}} offers {{$service->type}} {{$service->kind->name}}. It will cost you ${{$service->price}} for {{$service->duration->duration}} minutes<br>
You can find them at: {{$salon->address}}, {{$salon->city}}. They are open from {{$salon->open}} till {{$salon->close}}. Reserve your treatment at {{$salon->phone}} or visit their webpage: {{$salon->url}} <br>
{{$service->description}}<br><br>
@endforeach
@endforeach
@endif

<br>
<br>

@stop