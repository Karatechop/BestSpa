{{ucwords($service->salon->name)}} 
offers {{strtolower ($service->type->name)}} {{strtolower ($service->kind->name)}}. 
It will cost you ${{$service->price}} for {{$service->duration}} minutes<br>

You can find them at: {{ucwords($service->salon->address)}}, 
{{ucwords($service->salon->city)}}. 

They are open from {{$service->salon->open_h}}:{{$service->salon->open_m}} 
till {{$service->salon->close_h}}:{{$service->salon->close_m}}. 

Reserve your treatment at {{$service->salon->int_code}}{{$service->salon->coun_code}}{{$service->salon->net_code}}{{$service->salon->phone}} or visit their webpage: {{strtolower ($service->salon->url)}} <br>
{{$service->description}}
<br>
<a href="/adminpanel/services/edit/{{ $service->id }}" class="btn btn-warning">Edit</a>
<a href="/adminpanel/services/delete/{{ $service->id }}" class="btn btn-danger">Delete</a>
<br>
