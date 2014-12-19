@extends('master')

@section('content')

<h1>Log in</h1>

<div class="row">
        <div class="col-lg-6">
             
@include ('flash_message')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Please log in to use admin panel</h3>
	</div>
	<div class="panel-body">

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email', '', array('class'=>'col-lg-8')) }}<br><br>

    Password:<br>
    {{ Form::password('password', array('class'=>'col-lg-8')) }}<br><br>

    {{ Form::submit('Submit', array('class'=> 'btn btn-primary btn-lg')) }}

{{ Form::close() }}

	</div>
	
	</div>
	
	
	</div>

</div> 


<br>
<br>

@stop
