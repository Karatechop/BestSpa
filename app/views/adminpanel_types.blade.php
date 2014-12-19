@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_types_navbar')

@include ('flash_message')

<h2>Types of service kinds</h2>

<a href="/adminpanel/types/create" class="btn btn-primary">Add a new type of service kind</a>
<br>
<br>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">List of all types of service kinds</h3>
  </div>
  <div class="panel-body">

  
<table id="dataTable" class="tablesorter table table-striped table-hover"> 
<thead> 
<tr> 
    <th>Type name</th> 
    <th>Created at:</th> 
    <th>Updated at:</th>
    <th>Edit:</th> 
    <th>Delete:</th> 
</tr> 
</thead> 
<tbody>

@foreach ($types as $type)

@include ('types_table')
@include ('types_table_buttons')

@endforeach

</tbody>
</table>

  </div>
</div>

<br>
<br>

@stop
