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

	<p>Are you sure you would like to delete this service?</p>
	
@include ('services_table')	
	
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
