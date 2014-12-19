@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_types_navbar')

@include ('flash_message')


@if($query)
		<h2>You've searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($type_results) == 0)
		No results<br><br>
	@else

<div class="panel panel-info">

  <div class="panel-heading">
    <h3 class="panel-title">Search results</h3>
  </div>

<div class="panel-body"><table id="myTable" class="table table-striped table-hover"> 
<thead class="info"> 
<tr> 
    <th>Type name</th> 
    <th>Created at:</th> 
    <th>Updated at:</th>
    <th>Edit service kind type</th> 
    <th>Delete service kind type</th> 
</tr> 
</thead> 
<tbody>

@foreach ($type_results as $type)

@include ('types_table')
@include ('types_table_buttons')

@endforeach

</tbody>
</table>

</div>
</div>

@endif



@stop