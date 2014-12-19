@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_salons_navbar')

<div class="row">
        <div class="col-lg-12">
             
@include ('flash_message')
        
	<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Delete this salon</h3>
	</div>
	<div class="panel-body">

	<p>Are you sure you would like to delete this salon?</p>

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
</tr> 
</thead> 
<tbody>
	
@include ('salons_table')	

</tbody>
</table>

<br>

{{Form::open(array('url' => '/adminpanel/salons/delete'.$salon->id, 'method' => 'DELETE'))}}
    {{Form::submit("Permanently delete this salon", array('class' => 'btn btn-danger'))}}
{{Form::close()}}

	
	</div>
	
	</div>
	
	
	</div>

</div> 


<br>
<br>



	
@stop
