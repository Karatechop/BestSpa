@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_kinds_navbar')

@include ('flash_message')

<h1>Search results</h1>

@if($query)
		<h2>You've searched for: {{{ $query }}}</h2>
	@endif

	@if(sizeof($kind_results) == 0)
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
    <th>Edit kind</th> 
    <th>Delete kind</th> 
</tr> 
</thead> 
<tbody>

@foreach ($kind_results as $kind)

@include ('kinds_table')
@include ('kinds_table_buttons')

@endforeach

</tbody>
</table>

</div>
</div>

@endif



@stop