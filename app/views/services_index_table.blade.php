<tr>
 <td>{{strtolower ($service->kind->name)}}</td>
 <td>{{strtolower ($service->type->name)}}</td> 
 <td>{{$service->price}}</td>
 <td>{{$service->duration}}</td>
 <td>{{ucwords($service->salon->name)}}</td> 
 <td>{{ucwords($service->salon->city)}}</td>
 <td>{{ucwords($service->salon->address)}}</td> 
 <td>{{$service->salon->open_h}}:{{$service->salon->open_m}}</td> 
 <td>{{$service->salon->close_h}}:{{$service->salon->close_m}}</td>
 <td>{{$service->salon->int_code}}{{$service->salon->coun_code}}{{$service->salon->net_code}}{{$service->salon->phone}}</td>
 <td><a href="{{$service->salon->url}}" class="btn btn-primary btn-xs">{{$service->salon->url}}</a> </td>
     
