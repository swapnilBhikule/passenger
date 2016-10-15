@extends('layout.guestLayout')

@section('title')
	Welcome to passenger
@endsection

@section('style')

@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<h4 class="tagline">Clean, simple and made with Laravel!</h4>
			</div><!-- end of div twelve columns -->
		</div><!-- end of div row -->
		<div class="row">
			<div class="six columns">
				<h4>Sign Up</h4>
				@if(Session::has('signup-data'))
					<p class="light-color">{{ Session::get('signup-data') }}</p>
				@endif
				<form method="post" action="{{ route('guest.postSignUp') }}">
					<label for="sign-up-username">Username</label>
					<input type="text" name="username" id="sign-up-username" class="u-full-width" placeholder="Your New Username" required maxlength="20">
					@if($errors->has('username'))
						<p class="light-color">{{ $errors->first('username') }}</p>
					@endif
					<label for="sign-up-email">Email</label>
					<input type="email" name="email" id="sign-up-email" class="u-full-width" placeholder="Your Email Id" required maxlength="40">
					@if($errors->has('email'))
						<p class="light-color">{{ $errors->first('email') }}</p>
					@endif
					<label for="sign-up-password">Password</label>
					<input type="password" name="password" id="sign-up-password" class="u-full-width" placeholder="Type New Password" required maxlength="20">
					@if($errors->has('password'))
						<p class="light-color">{{ $errors->first('password') }}</p>
					@endif
					<!-- CSRF Protection -->
					{{ csrf_field() }}
					<button type="submit" class="button-primary">Sign Up</button>
				</form>
			</div><!-- end of div six columns -->
			<div class="six columns">
				<h4>Sign In</h4>
				@if(Session::has('signin-data'))
					<p class="light-color">{{ Session::get('signin-data') }}</p>
				@endif
				<form method="post" action="{{ route('guest.postSignIn') }}">
					<label for="sign-in-username">Username</label>
					<input type="text" name="sign-in-username" id="sign-in-username" class="u-full-width" placeholder="Your Username" required maxlength="20">
					@if($errors->has('sign-in-username'))
						<p class="light-color">{{ $errors->first('sign-in-username') }}</p>
					@endif
					<label for="sign-in-password">Password</label>
					<input type="password" name="sign-in-password" id="sign-in-password" class="u-full-width" placeholder="Type Password" required maxlength="20">
					@if($errors->has('sign-in-password'))
						<p class="light-color">{{ $errors->first('sign-in-password') }}</p>
					@endif
					<!-- CSRF Protection -->
					{{ csrf_field() }}
					<div class="row">
						<div class="six columns">
							<label>
							    <input type="checkbox" name="remember_me">
							    <span class="label-body">Remember me</span>
							  </label>
						</div>
						<div class="six columns">
							<button type="submit" class="button-primary">Sign In</button>
						</div>
					</div>
				</form>
			</div><!-- end of div six columns -->
		</div><!-- end of div row -->
	</div><!-- end of div container -->
@endsection

@section('js')

@endsection