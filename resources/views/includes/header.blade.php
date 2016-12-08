 <div class="journal-title">
  <div class="container text-center">
    <h1><a href="/">Journal Site </a></h1>
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      	<ul class="nav navbar-nav nav-left">
  		    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>

          <li class="{{ Request::is('editorial') ? 'active' : '' }}"><a href="/editorial">Editorial Board</a></li>

          <li class="{{ Request::is('manuscript') ? 'active' : '' }}"><a href="/editorial">Invitation For Manuscript</a></li>

          <li class="{{ Request::is('review_process') ? 'active' : '' }}"><a href="/review_process">Review Process</a></li>

          <li class="{{ Request::is('indexing') ? 'active' : '' }}"><a href="/review_process">Indexing</a></li>

          <li class="{{ Request::is('subscription') ? 'active' : '' }}"><a href="/subscription">Subscription</a></li>

  		    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About Us</a></li>
  		    <li class="{{ Request::is('projects') ? 'active' : '' }}"><a href="/projects">Projects</a></li>
  		    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact Us</a></li>
  		</ul>
  		<ul class="nav navbar-nav navbar-right">

  			@if (Auth::guest())
        		@include('includes.login')
        	@else

          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Welcome {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="/years">Year Management</a></li>
                <li><a href="/issues">Issue Management</a></li>
                <li><a href="/versions">Volume Management</a></li>
                <li class="divider"></li>
                <li><a href="/users">User Management</a></li>
                <li><a href="#">Another action</a></li>
                <li class="divider"></li>
                <!-- <li><a href="#">Settings</a></li> -->
                <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </li>

          <!-- <li><p class="navbar-text">Welcome {{ Auth::user()->name }}</p></li> -->
        	<!-- <li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> -->
        	@endif
      </ul>

      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>
