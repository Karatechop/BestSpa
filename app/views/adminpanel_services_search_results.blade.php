@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_services_navbar')

@include ('flash_message')

<h2>Services</h2>

@if($query)
		<h2>You've searched for: {{{ $query }}}</h2>
@endif

@if(sizeof($service_results) == 0)
		No results<br><br>
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
    <th>Edit service</th> 
    <th>Delete service</th> 
</tr> 
</thead> 
<tbody>

@foreach ($service_results as $service)

@include ('services_table')
@include ('services_table_buttons')

@endforeach

</tbody>
</table>

@endif

</tbody>
</table>

@if(!sizeof($service_results) == 0)
</div>
</div>
@endif

@stop