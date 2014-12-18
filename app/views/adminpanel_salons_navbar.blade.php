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
    <li class="active"><a href="/adminpanel/salons">Salons</a></li>
    <li><a href="/adminpanel/kinds">Kinds</a></li>
    <li><a href="/adminpanel/types">Types</a></li>
    </ul>
    
    	{{ Form::open(array('class'=> 'navbar-form navbar-left', 'url' => '/adminpanel/salons/search', 'method' => 'GET')) }}
		
		{{ Form::text('query', 'Look for salons', array('class'=>'form-control col-lg-8')) }} 

		{{ Form::submit('Search', array('class'=> 'form-control col-lg-8')); }} 
	
	{{ Form::close() }}
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/adminpanel/logout">Log out</a></li>
    </ul>
    
    
  </div>
  
</div>
