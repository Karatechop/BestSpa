@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_salons_navbar')

@include ('flash_message')

<h3>List of all salons</h3>

@foreach ($salon_cities as $key=> $value)

<div class="panel panel-info">

  <div class="panel-heading">
    <h3 class="panel-title">{{$value }} salons</h3>
  </div>

<div class="panel-body">
<table id="dataTable" class="tablesorter table table-striped table-hover"> 
<thead> 
<tr> 
    <th>Salon</th> 
    <th>Salon address</th> 
    <th>Salon city</th>
    <th>Opening hours</th>
    <th>Closing hours</th>
    <th>Contact</th> 
    <th>Webpagee</th>
    <th>Edit service</th> 
    <th>Delete service</th> 
</tr> 
</thead> 
<tbody>

@foreach ($salons as $salon)
@if ( ucwords($salon->city) == $value)

@include ('salons_table')
@include ('salons_table_buttons')

@endif

@endforeach


</tbody>
</table>
 

</div>
</div>
@endforeach


@stop
