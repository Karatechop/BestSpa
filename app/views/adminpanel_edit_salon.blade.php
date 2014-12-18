@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_salons_navbar')

<div class="row">
        <div class="col-lg-6">
             
@include ('flash_message')
        
            <div class="panel panel-primary">
            	<div class="panel-heading">
            	   <h3 class="panel-title">Edit this salon</h3>
  </div>
  <div class="panel-body">


<h5>Genaral details</h5>

{{Former::horizontal_open()
  ->id('SalonEditForm')
  ->url('adminpanel/salons/edit/$salon->id')
  ->rules(array( 
  	  'name' => 'required|unique:types,name|max:20',
  	  'city' => 'required|max:20',
  	  'address' => 'required|max:50',
  	  'open_h' => 'required|numeric|between:0,24',
  	  'open_m' => 'required|numeric|between:0,59',
  	  'close_h' => 'required|numeric|between:0,24',
  	  'close_m' => 'required|numeric|between:0,59',
  	  'int_code' => 'required|max:2',
  	  'coun_code' => 'required|between:0,9999',
  	  'net_code' => 'required|between:0,999',
  	  'phone' => 'required|max:9999999999',
  	  'url' => 'required|url',
  	  ))
  ->method('POST') 
}}


{{Former::populate($salon)}}

{{Former::text('name',"Enter salon's name")
  ->class('col-lg-12')
  ->required();
}}

{{Former::text('city',"In which city is this salon located?")
  ->class('col-lg-12')
  ->required();
}}

{{Former::text('address',"Enter salon's address")
  ->class('col-lg-12')
  ->required();
}}

<br>
<br>

<h5>Opening/closing hours details</h5>

<div class = "col-lg-6">
{{Former::number('open_h',"Enter opening hours in HH format")
  ->class('col-lg-4')
  ->required();
}}

{{Former::number('open_m',"Enter opening minutes in MM format")
  ->class('col-lg-4')
  ->required();
}}
</div>

<div class = "col-lg-6">
{{Former::number('close_h',"Enter closing hours in HH format")
  ->class('col-lg-4')
  ->required();
}}

{{Former::number('close_m',"Enter closing minutes in MM format")
  ->class('col-lg-4')
  ->required();
}}
</div>

<br>
<br>
<br>
<br>
<br>
<br>

<h5>Telephone number details</h5>

<div class = "col-lg-4">
{{Former::select('int_code',"International code")->options(["00" => "00"])
  ->class('col-lg-12')
  ->required();
}}
</div>

<div class = "col-lg-4">
{{Former::number('coun_code',"Country code.")
  ->class('col-lg-12')
  ->required();
}}
</div>

<div class = "col-lg-4">
{{Former::number('net_code',"Network code.")
  ->class('col-lg-12')
  ->required();
}}
</div>



{{Former::number('phone',"Enter salon's telephone number")
  ->class('col-lg-12')
  ->required();
}}

<br>
<br>
<h5>Webpage</h5>

{{Former::url('url',"Enter salon's webpage")
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
