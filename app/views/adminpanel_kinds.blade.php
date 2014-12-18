@extends('master')

@section('content')

<h1>Admin panel</h1>

@include ('adminpanel_kinds_navbar')

@include ('flash_message')

<h2>Kinds</h2>

<a href="/adminpanel/kinds/create" class="btn btn-primary">Add a new service kind</a>
<br>

{{ "<strong> All service kinds: </strong>" }} <br>
@foreach ($kinds as $kind)
@include ('kinds_table')
@endforeach



<br>
<br>

@stop
