<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- Mobile Specific Metas
  	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- FONT
  	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  	<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

	<!-- CSS
  	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/normalize.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/skeleton.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/global.css') }}">
	@yield('style')
</head>
<body>
	<nav class="navbar">
		<div class="container">
			<h3>
				<a href="{{ route('guest.index') }}" class="navbar-logo">passenger</a>
			</h3>
		</div><!-- end of div container -->
	</nav><!-- end of div navbar -->
	
	@yield('content')

	@include('layout.footer')

	@yield('js')

</body>
</html>