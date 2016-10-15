<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

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
			<h3 class="u-pull-left">
				<a href="{{ route('guest.index') }}" class="navbar-logo">passenger</a>
			</h3>
			<ul class="navbar-list u-pull-right">
				<li class="navbar-item"><a href="{{ route('user.getLogout') }}">Logout</a></li>
			</ul>
		</div><!-- end of div container -->
	</nav><!-- end of div navbar -->

	@yield('content')

	@include('layout.footer')

	<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
	@yield('js')

</body>
</html>