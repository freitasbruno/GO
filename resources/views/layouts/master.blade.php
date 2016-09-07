<!DOCTYPE html>
<html>
    <head>
        <title>GO . Bitlab</title>

		<!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Yantramanav:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap Core CSS -->
    	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
    	
	    <!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		        </button>
		        <a class="navbar-brand" href="{{ URL::to('/') }}">
		        	<p class="nav-icon">GO</p>
		        	<!--<img src="{{ asset('images/go_logo.png') }}" class="nav-icon"/>-->
		        </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav pull-right">
		            	<li><a href="{{ URL::to('/home') }}">HOME</a></li>
		            	<li><a href="{{ URL::to('/contact') }}">CONTACT</a></li>
		        </ul>
		    </div>
		    <!-- /.navbar-collapse -->
		</nav>
    	
    	<div class="container">
    		<div class="col-md-6 col-centered text-center">
    			@yield('header')
    		</div>
    	</div>
    	
    	<div class="container">
    		@yield('content')
    	</div>
    	
    	<div class="footer">
		    <p class="text-muted text-center">GO . Group Organizer | BITLAB 2016</p>
    	</div>
    	
        <!-- jQuery -->
	    <script src="{{ asset('js/jquery.js') }}"></script>
	
	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    
        <!-- JS Files -->
		<script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
		<!--<script src="https://unpkg.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>-->
		
		@yield('scripts')
		
    </body>
</html>
