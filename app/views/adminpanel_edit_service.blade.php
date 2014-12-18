@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_services_navbar')

<div class="row">
        <div class="col-lg-6">
             
        @if(Session::get('flash_message'))
       	
        <div class="alert {{ Session::get('alert_class', 'alert-info') }}">
       	{{ Session::get('flash_message') }}
	<br>
	
	@if(isset($errors))
	@foreach($errors->all() as $message) 
	<li>{{ $message }}</li>
	@endforeach
	@endif
	
	</div>
	@endif
        
            <div class="panel panel-primary">
            	<div class="panel-heading">
            	   <h3 class="panel-title">Edit this service</h3>
  </div>
  <div class="panel-body">


<h5>Genaral details</h5>

{{Former::horizontal_open()
  ->id('ServiceCreateForm')
  ->url('adminpanel/services/create')
  ->rules(array( 
  	  'kind_id' => 'required',
  	  'type' => 'required',
  	  'duration_id' => 'required',
  	  'part' => 'required',
  	  'descrition' => 'max:300',
  	  'salon[]' => 'required'
  	  ))
  ->method('POST') 
}}

{{Former::populate($service)}}

{{Former::select('kind_id',"Select service kind")->options($kinds)
  ->class('col-lg-12')
  ->required();
}}

{{Former::select('type',"Select service type")->options(
		["turkish" => "turkish", 
		"finnish" => "finnish",
		"swedish" => "swedish",
		"russian banya" => "russian banya"], $service->type)
  ->class('col-lg-12')
  ->required();
}}

{{Former::select('duration_id',"Select service duration")->options($durations)
  ->class('col-lg-12')
  ->required();
}}


<div class="control-group error required">
<label for="price" class="control-label">Enter service price<sup>*</sup></label>
<div class="controls">
<input required="true" min="0" max="1000" class="col-lg-12" id="price" type="number" step="0.01" name="price" value="{{$service->price}}">
</div>
</div>

{{Former::select('part',"Is this service part of a larger spa treatment? Select 1 for Yes, 0 for No")->options(
		["0" => "0", 
		"1" => "1" ])
  ->class('col-lg-12')
  ->required();
}}

{{
Former::textarea('description', "Describe this service. (max 300 characters)")
   ->class('col-lg-12')	
   ->state('error');
}}


<br>
<br>

@foreach ($salons as $id => $salon)
<div class="checkbox col-lg-4">
{{ Form::checkbox('salons[]', $id, $service->salon->contains($id));}} {{ $salon }}
</div>
@endforeach

	

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
