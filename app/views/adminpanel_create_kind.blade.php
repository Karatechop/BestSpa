@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_kinds_navbar')

<div class="row">
        <div class="col-lg-6">
             
@include ('flash_message')
        
            <div class="panel panel-primary">
            	<div class="panel-heading">
            	   <h3 class="panel-title">Add a new service kind</h3>
  </div>
  <div class="panel-body">


{{Former::horizontal_open()
  ->id('KindCreateForm')
  ->url('adminpanel/kind/create')
  ->rules(array( 
  	  'name' => 'required|max:20',
  	  ))
  ->method('POST') 
}}


{{Former::text('name',"Enter new service kind")
  ->class('col-lg-12'); 
}}

<br>
<br>		

{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset')
}}


{{Former::close()}}
</div>

</div>

</div>

</div>


<br>
<br>



	
@stop
