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

<div class="panel panel-info">

  <div class="panel-heading">
    <h3 class="panel-title">Search results</h3>
  </div>

<div class="panel-body">
<table id="dataTable" class="tablesorter table table-striped table-hover"> 
<thead> 
<tr> 
    <th>Service kind</th> 
    <th>Service type</th> 
    <th>Service price, $</th>
    <th>Service duration, min</th>
    <th>Salon</th>
    <th>City</th>
    <th>Address</th>
    <th>Opening hours</th>
    <th>Closing hours</th>
    <th>Contact</th>
    <th>Webpage</th>
    
</tr> 
</thead> 
<tbody>
	
@foreach ($service_results as $service)

@include ('services_index_table')

@endforeach

</tbody>
</table>


</div>
</div>

@endif

<br>
<br>

@stop