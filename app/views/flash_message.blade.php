        @if(Session::get('flash_message'))
       	
        <div class="alert {{ Session::get('alert_class', 'alert-info') }}">
       	{{ Session::get('flash_message') }}
	<br>
	
	@if(isset($errors))
	@foreach($errors->all() as $message) 
	{{ $message }}<br>
	@endforeach
	@endif
	
	</div>
	@endif
