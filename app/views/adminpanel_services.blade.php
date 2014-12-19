@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_services_navbar')


@include ('flash_message')

<h2>Services</h2>

<a href="/adminpanel/services/create" class="btn btn-primary">Add a new service</a>
<br>
<br>

<h3>List of all services: </h3>

@foreach ($salon_names as $key=> $value)

<div class="panel panel-info">

  <div class="panel-heading">
    <h3 class="panel-title">{{$value }} services:</h3>
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

@foreach ($services as $service)

@if ($service->salon->name == $value)


@include ('services_table')
@include ('services_table_buttons')


@endif

@endforeach


</tbody>
</table>
 

</div>
</div>
@endforeach



@stop
