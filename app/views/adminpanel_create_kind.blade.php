@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_kinds_navbar')

<div class="row">
        <div class="col-lg-6">
             
        @if(Session::get('flash_message'))
       	
        <div class="alert {{ Session::get('alert_class', 'alert-info') }}">
       	{{ Session::get('flash_message') }}
	<br>
	
	@foreach($errors->all() as $message) 
	<li>{{ $message }}</li>
	
	@endforeach
	</div>
	@endif
        
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
  ->class('col-lg-12')
  ->required(); 
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
