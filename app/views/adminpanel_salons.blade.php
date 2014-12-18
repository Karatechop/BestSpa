@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_salons_navbar')

@if(Session::get('flash_message'))
       	
        <div class="alert {{ Session::get('alert_class', 'alert-info') }}">
       	{{ Session::get('flash_message') }}
	</div>
@endif

<h2>Salons</h2>

<a href="/adminpanel/salons/create" class="btn btn-primary">Add a new salon</a>
<br>
<br>

@foreach ($salon_cities as $key=> $value)
{{ "<strong>".$value." salons: </strong>" }} <br>
@foreach ($salons as $salon)
@if ( ucwords($salon->city) == $value)

@include ('salons_table')

@endif
@endforeach
<br>
@endforeach


<br>
<br>

@stop
