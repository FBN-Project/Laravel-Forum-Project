	<div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">CodeHub</a>

          </div>


          <div class="navbar-collapse collapse pull-right">
                <ul class="nav navbar-nav navbar-right">
      
	        		<li class="dropdown">
	          			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true">    User Account </i><b class="caret"></b></a>
	          			<ul class="dropdown-menu">
	          		@if(Auth::check())

	            			<li><a href="{{ action('UserController@getProfile') }}">User Profile</a></li>
	            			<li class="divider"></li>
	            			<li><a href="{{ url('/logout') }}">Log Out</a></li>


	          		@else

			            	<li><a href="{{ url('/login') }}">Sign In</a></li>
			            	<li class="divider"></li>
			            	<li><a href="{{ url('/register') }}">Sing Up</a></li>

	          		@endif
	  
	            
	          			</ul>
	        		</li>
      		</ul>

          </div><!--/.nav-collapse -->

          <ul class="nav navbar-nav pull-right">
              @if(Auth::check())
                  <li><a href="#">Welcome {{ Auth::user()->name }}</a></li>
              @endif
              <li><a href="{{ action('ForumController@getPost') }}">Question?</a></li>
          </ul>
        </div><!--/.container-fluid -->
      </div>
