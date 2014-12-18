@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_durations_navbar')


<h2>Durations</h2>

<a href="/adminpanel/durations/create" class="btn btn-primary">Add a new service duration</a>
<br>

{{ "<strong> All service durations: </strong>" }} <br>
@foreach ($durations as $duration)

@include ('durations_table')

@endforeach

<br>
<br>

@stop
