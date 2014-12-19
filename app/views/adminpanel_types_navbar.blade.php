<div class="navbar navbar-default">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    
    <ul class="nav navbar-nav">
    <li><a href="/">Go to index page</a></li>  
    <li><a href="/adminpanel">Services</a></li>
    <li><a href="/adminpanel/salons">Salons</a></li>
    <li><a href="/adminpanel/kinds">Kinds</a></li>
    <li class="active"><a href="/adminpanel/types">Types</a></li>
    </ul>
    
    	{{ Form::open(array('class'=> 'navbar-form navbar-left', 'url' => '/adminpanel/types/search', 'method' => 'GET')) }}
		
		{{ Form::text('query', '', array('class'=>'form-control col-lg-8', 'placeholder'=>'Look for service types')) }} 

		{{ Form::submit('Search', array('class'=> 'form-control col-lg-8')); }} 
	
	{{ Form::close() }}
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/logout">Log out</a></li>
    </ul>
    
    
  </div>
  
</div>
