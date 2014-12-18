
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Test queries</title>
</head>

<body>

<h1>Test queries</h1>
<hr>

<h2>Salon queries</h2>

<strong>All salons' data:</strong><br>

@foreach ($salons as $salon)
{{$salon->name}} is from {{$salon->city}} city. Their address is {{$salon->address}}. They open at {{$salon->open}}. They close at {{$salon->close}}. You can call them at {{$salon->phone}}. Their webpage is {{$salon->url}}<br>
@endforeach

<br>
<br>

<strong>Gotham city salon:</strong><br>

@foreach ($salon_gotham as $salon)
{{$salon->name}}
@endforeach

<br>
<br>

<strong>Salons that close before or at 21.00:</strong><br>

@foreach ($salon_close as $salon)
{{$salon->name}}<br>
@endforeach

<hr>

<h2>Duration queries</h2>

List of service durations (min):<br>

@foreach ($durations as $duration)
{{$duration->duration}}<br>
@endforeach

<hr>

<h2>Sort queries</h2>

List of available kinds of service:<br>

@foreach ($sorts as $sort)
{{$sort->name}}<br>
@endforeach

<hr>

<h2>Service queries with relationships</h2>

<h3>All services:</h3>
@foreach ($services as $service)

@foreach ($service->salon as $salon)
{{$salon->name}}:  {{ucfirst($service->type)}} {{$service->sort->name}} lasts {{$service->duration->duration}} minutes<br>
@endforeach

@endforeach

<h3>All massages:</h3>
@foreach ($services as $service)

@foreach ($service->salon as $salon)

@if ($service->sort->name == $service_massage)
{{$salon->name}} offers {{$service->type}} {{$service->sort->name}}. It will cost you ${{$service->price}} for {{$service->duration->duration}} minutes<br>
You can find them at: {{$salon->address}}, {{$salon->city}}. They are open from {{$salon->open}} till {{$salon->close}}. Reserve your treatment at {{$salon->phone}} or visit their webpage: {{$salon->url}} <br>
{{$service->description}}<br><br>
@endif

@endforeach

@endforeach

<h3>All saunas:</h3>
@foreach ($services as $service)

@foreach ($service->salon as $salon)

@if ($service->sort->name == $service_sauna)
{{$salon->name}} offers {{$service->type}} {{$service->sort->name}}. It will cost you ${{$service->price}} for {{$service->duration->duration}} minutes<br>
You can find them at: {{$salon->address}}, {{$salon->city}}. They are open from {{$salon->open}} till {{$salon->close}}. Reserve your treatment at {{$salon->phone}} or visit their webpage: {{$salon->url}} <br>
{{$service->description}}<br><br>
@endif

@endforeach

@endforeach


<h3>All saunas from Metropolis:</h3>

@foreach ($services as $service)

@foreach ($service->salon as $salon)

@if ($service->sort->name == $service_sauna && $salon->city == $service_city)
{{$salon->name}} offers {{$service->type}} {{$service->sort->name}}. It will cost you ${{$service->price}} for {{$service->duration->duration}} minutes<br>
You can find them at: {{$salon->address}}, {{$salon->city}}. They are open from {{$salon->open}} till {{$salon->close}}. Reserve your treatment at {{$salon->phone}} or visit their webpage: {{$salon->url}} <br>
{{$service->description}}<br><br>

@else
Nothing found

@endif

@endforeach

@endforeach


<hr>


</body>
