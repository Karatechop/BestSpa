@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_kinds_navbar')

@include ('flash_message')

<h2>Kinds of service</h2>

<a href="/adminpanel/kinds/create" class="btn btn-primary">Add a new service kind</a>
<br>
<br>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">List of all kinds of service</h3>
  </div>
  <div class="panel-body">

  
<table id="dataTable" class="tablesorter table table-striped table-hover"> 
<thead> 
<tr> 
    <th>Kind name</th> 
    <th>Created at:</th> 
    <th>Updated at:</th>
    <th>Edit:</th> 
    <th>Delete:</th> 
</tr> 
</thead> 
<tbody>

@foreach ($kinds as $kind)

@include ('kinds_table')
@include ('kinds_table_buttons')

@endforeach

</tbody>
</table>

  </div>
</div>

<br>
<br>

@stop
