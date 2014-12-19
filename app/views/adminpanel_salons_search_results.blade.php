@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_salons_navbar')

@include ('flash_message')

<h1>Search results</h1>

@if($query)
		<h2>You've searched for: {{{ $query }}}</h2>
@endif

@if(sizeof($salon_results) == 0)
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

@foreach ($salon_results as $salon)

@include ('salons_table')
@include ('salons_table_buttons')

@endforeach

@endif

</tbody>
</table>

@if(!sizeof($salon_results) == 0)
</div>
</div>
@endif

@stop