<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>Картотека профсоюза</title>

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
		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    <script type="text/javascript" charset="utf8" src="{{ asset('js/datatables.min.js') }}"></script>
	    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
		
		@stack('scripts')
		<!-- /Scripts -->
		
	</body>
</html>
