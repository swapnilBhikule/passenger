@extends('layout.layout')

@section('title')
	Dashboard
@endsection

@section('style')

@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="eight columns">
				<h5>Welcome back, {{ $username->username }}</h5>
			</div><!-- end of div eight columns -->
			<div class="four columns">
				<div class="u-pull-right">
					<button type="button" class="button-primary" data-toggle="modal" data-target="#new-account-modal">
						Add new entry
					</button>
				</div><!-- end of div u-pull-right -->
			</div><!-- end of div four columns -->
		</div><!-- end of div row -->

		<div class="row">
			<table class="u-full-width" id="vault-table">
				<thead>
					<tr>
						<th>Account</th>
						<th>Email</th>
						<th>Password</th>
						<th>Website</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($accounts as $account)
						<tr id="row-{{ $account->id }}">
							<td id="account-{{ $account->id }}">
								{{ $account->account_name }}
							</td>
							<td id="email-{{ $account->id }}">
								{{ $account->email }}
							</td>
							<td id="password-{{ $account->id }}">
								{{ $account->password }}
							</td>
							<td>
								<a href="http://{{ $account->website }}" id="website-{{ $account->id }}">
									{{ $account->website }}
								</a>
							</td>
							<td id="description-{{ $account->id }}">
								{{ $account->description }}
							</td>
							<td>
								<button type="button" class="round-button delete-link" id="delete-{{ $account->id }}">
									&#10005;
								</button>
								<button type="button" class="round-button edit-link" id="edit-{{ $account->id }}">
									&#9998;
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- end of div row -->
	</div><!-- end of div container -->

	@include('user.addAccountModal')
	@include('user.editAccountModal')
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('/js/dashboard.js') }}"></script>
@endsection