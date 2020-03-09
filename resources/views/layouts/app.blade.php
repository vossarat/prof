<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>Картотека профсоюза</title>

	    <!-- icons -->
	    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
			   
	    <!-- Styles -->
	    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
	</head>

	<body>
	    <div id="app">
	        
	        <!-- Header -->
	        @include('layouts.header')
	        <!-- /Header -->

	        @yield('content')
	    </div>

	    <!-- Scripts -->
	    
	    	    
		<script>
			// this javascript code runs on the the layout markup of a MVC NET app. 
			if ("serviceWorker" in navigator) {
	            if (navigator.serviceWorker.controller) {
	                console.log("[PWA Builder] active service worker found, no need to register");
	            } else {
	                // Register the service worker
	                navigator.serviceWorker
	                  .register("/sw.js", {
	                      scope: "./"
	                  })
	                  .then(function (reg) {
	                      console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
	                  });
	            }
	        }
		</script>
			
		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    <script type="text/javascript" charset="utf8" src="{{ asset('js/datatables.min.js') }}"></script>
	    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
		
		@stack('scripts')
		<!-- /Scripts -->
		
	</body>
</html>
