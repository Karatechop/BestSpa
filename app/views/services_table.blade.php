{{ucwords($salon->name)}} offers {{strtolower ($service->type)}} {{strtolower ($service->kind->name)}}. It will cost you ${{$service->price}} for {{$service->duration->duration}} minutes<br>
You can find them at: {{ucwords($salon->address)}}, {{ucwords($salon->city)}}. They are open from {{$salon->open_h}}:{{$salon->open_m}} till {{$salon->close_h}}:{{$salon->close_m}}. Reserve your treatment at {{$salon->int_code}}{{$salon->coun_code}}{{$salon->net_code}}{{$salon->phone}} or visit their webpage: {{strtolower ($salon->url)}} <br>
{{$service->description}}
<br>
<a href="/adminpanel/services/edit/{{ $service->id }}" class="btn btn-warning">Edit</a>
<a href="/adminpanel/services/delete/{{ $service->id }}" class="btn btn-danger">Delete</a>
<br>
