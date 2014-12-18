{{strtolower ($kind->name)}}	
created at:{{$kind->created_at}}	
updated at: {{$kind->updated_at}}
<br>
<a href="/adminpanel/kinds/edit/{{ $kind->id }}" class="btn btn-warning">Edit</a>
<a href="/adminpanel/kinds/delete/{{ $kind->id }}" class="btn btn-danger">Delete</a>
<br>
