<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="responsive bootstrap" />
	<meta name="keywords" content="responsive, bootstrap" />
	<meta name="author" content="Rober Sehuanez Jimenez" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="/favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet"> -->
	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/myStyle.css') }}">

	<!-- Animate.css 
	<link rel="stylesheet" href="css/animate.css"> -->
	<link href="{{ asset('plugins/bootstrap/css/animate.css') }}" rel="stylesheet">
	<!-- Icomoon Icon Fonts
	<link rel="stylesheet" href="css/icomoon.css">-->
	<link href="{{ asset('plugins/bootstrap/css/icomoon.css') }}" rel="stylesheet">
	<!-- Bootstrap  
	<link rel="stylesheet" href="css/bootstrap.css">-->
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<!-- animatedresponsiveImagegrid  
	<link rel="stylesheet" href="css/animatedresponsiveImagegrid.css">-->
	<link href="{{ asset('plugins/bootstrap/css/animatedresponsiveImagegrid.css') }}" rel="stylesheet">
	<!-- Magnifoc Popup  
	<link rel="stylesheet" href="css/magnific-popup.css">-->
	<link href="{{ asset('plugins/bootstrap/css/magnific-popup.css') }}" rel="stylesheet">

	<!--<link rel="stylesheet" href="css/style.css">-->
	<!-- <link href="{{ asset('plugins/bootstrap/css/myStyle.css') }}" rel="stylesheet"> -->
	<link href="{{ asset('plugins/bootstrap/css/style.css') }}" rel="stylesheet">

	<link href="{{ asset('plugins/bootstrap/css/search.css') }}" rel="stylesheet">

	<!-- Modernizr JS 
	<script src="js/modernizr-2.6.2.min.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	@yield('linkHead')
	</head>
	<body>

	<nav id="fh5co-main-nav" role="navigation">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle active"><i></i></a>
		<div class="js-fullheight fh5co-table">
			<div class="fh5co-table-cell js-fullheight">
				<ul>
					<li @yield('home')><a href="{{ action('EmployeeController@main') }}">Principal</a></li>
					<li @yield('register')><a href="{{ action('EmployeeController@newCustomer') }}">Registrar</a></li>
					<li @yield('personal')><a href="{{ action('EmployeeController@personal') }}">Personal</a></li>
					<li @yield('statistics')><a href="#">Estadisticas</a></li>
					<li><a href="{{ action('LoginController@sessionOut') }}">Salir</a></li>
					<!-- <li><a href="contact.html">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
	
	<div id="fh5co-page">
		<header>
			<div class="container">
				<div class="fh5co-navbar-brand">
					<h1 class="text-center"><a class="fh5co-logo" href="{{ action('EmployeeController@main') }}"><i class="icon-camera2"></i></a></h1>
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				</div>
			</div>
		</header>
		<div  class="container">
			<div class="row">
				<div class="col-xs-12 ">
					@if (session('alert'))
	                    <div class="alert alert-success">
	                        {{ session('alert') }}
	                    </div>
	                @endif 
					@yield('container')
				</div>
			</div>
		</div>	
	</div>

	@yield('underBody')

	<!-- jQuery 
	<script src="js/jquery.min.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing 
	<script src="js/jquery.easing.1.3.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap 
	<script src="js/bootstrap.min.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints 
	<script src="js/jquery.waypoints.min.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/jquery.waypoints.min.js') }}"></script>
	<!-- Counters 
	<script src="js/jquery.countTo.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/jquery.countTo.js') }}"></script>
	<!-- gridrotator 
	<script type="text/javascript" src="js/jquery.gridrotator.js"></script>-->
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/jquery.gridrotator.js') }}"></script>
	<!-- Magnific Popup 
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>-->
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/jquery.magnific-popup.min.js') }}"></script>

	<!-- Main JS (Do not remove) 
	<script src="js/main.js"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/main.js') }}"></script>

	<script src=" {{ asset('plugins/notify/notify.min.js') }} "></script>

	<script src=" {{ asset('plugins/maskedInput/maskedinput.js') }} "></script>

	<script type="text/javascript">	
		$(function() {
		
			$( '#ri-grid' ).gridrotator( {
				rows : 3,
				// number of columns 
				columns : 6,
				w1024 : { rows : 3, columns : 5 },
				w768 : {rows : 3,columns : 4 },
				w480 : {rows : 3,columns : 3 },
				w320 : {rows : 2,columns : 2 },
				w240 : {rows : 1,columns : 1 },
				preventClick : false
			} );
		
		});
	</script>
	@yield('script')
	</body>
</html>

