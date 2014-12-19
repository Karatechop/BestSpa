@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_services_navbar')

<div class="row">
        <div class="col-lg-12">
             
@include ('flash_message')
        
	<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Delete this service</h3>
	</div>
	<div class="panel-body">

	<p>Are you sure you would like to delete this <strong>{{$service->salon->name}}</strong> service?</p>

<table id="dataTable" class="tablesorter table table-striped table-hover"> 
<thead> 
<tr> 
    <th>Service kind</th> 
    <th>Service type</th> 
    <th>Service price, $</th>
    <th>Service duration, min</th>
    <th>Salon</th>
</tr> 
</thead> 
<tbody>
	
@include ('services_table')	

</tbody>
</table>

<br>

{{Form::open(array('url' => '/adminpanel/services/delete'.$service->id, 'method' => 'DELETE'))}}
    {{Form::submit("Permanently delete this service", array('class' => 'btn btn-danger'))}}
{{Form::close()}}

	
	</div>
	
	</div>
	
	
	</div>

</div> 


<br>
<br>



	
@stop
