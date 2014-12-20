@extends('master')

@section('content')

<br>
<div class="jumbotron">
  <h1 class="text-primary">Welcome to BestSpa</h1>
  <p>This is app helps you find and compare all spa treatments in your local area.</p>
</div>

@include ('index_navbar')

<br>
@include ('flash_message')

<div class="panel panel-info">

  <div class="panel-heading">
    <h3 class="panel-title">List of all available services</h3>
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

@foreach ($services as $service)

@include ('services_index_table')

@endforeach

</tbody>
</table>


</div>
</div>


@stop
