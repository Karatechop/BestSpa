<tr>
 <td>{{ucwords($salon->name)}}</td> 
 <td>{{ucwords($salon->address)}}</td>
 <td>{{ucwords($salon->city)}}</td> 
 <td>{{$salon->open_h}}:{{$salon->open_m}}</td> 
 <td>{{$salon->close_h}}:{{$salon->close_m}}</td>
 <td>{{$salon->int_code}}{{$salon->coun_code}}{{$salon->net_code}}{{$salon->phone}}</td>
 <td><a href="{{$salon->url}}" class="btn btn-primary btn-xs">{{$salon->url}}</a> </td>
     
