@extends('layouts.app')
@section('content')
	<div class="ui two column text centered grid">
		<div class="column">
			<form class="ui form" method="POST" action="">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				@if ($errors->any())
					@foreach ($errors->all() as $err)
						<p>{{ $err }}</p>
					@endforeach
				@endif

				<div class="field">
					<label>Username</label>
					<input disabled="disabled" readonly=""type="text" name="username" value="{{Auth::user()->username}}">
				</div>
				<div class="field">
					<label>First Name</label>
					<input type="text" name="first_name" value="{{Auth::user()->first_name}}">
				</div>
				<div class="field">
					<label>Last Name</label>
					<input type="text" name="last_name" value="{{Auth::user()->last_name}}">
				</div>
				<div class="field">
					<label>Vecchia password</label>
					<input type="password" name="oldPassword" >
				</div>
				<div class="field">
					<label>Nuova password</label>
					<input type="password" name="password" >
				</div>
				<div class="field">
					<label>Ripeti nuova password</label>
					<input type="password" name="password_confirmation" >
				</div>
				<button class="ui blue button" type="submit">Update</button>
			</form>
		</div>
	</div>
	<div class="ui text container">
		<div class="ui section divider"></div>
	</div>

	<div class="ui four column text centered grid">
		<div class="column">
			<form class="ui form" method="POST" action='{{url("accounts/emails")}}'>
				{{ csrf_field() }}
				<div class="field">
					<label>Email</label>
					<div class="ui right action input">
						<input type="text" name="email" placeholder="email">
						<button class="positive ui button" type="submit">Add email</button>
					</div>
				</div>
			</form>
		</div>
		<div class="column ui form">
			<div class="field">
				<label>Registered emails:</label>
				@foreach($emails->all() as $em)
					<div class="ui buttons">
						<form class="ui form" method="POST" action="{{url('accounts/emails')}}/{{$em->id}}">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<div class="ui right action input">
								<input type="text" name="email" value="{{$em->email}}">
								<button class="ui blue button" type="submit">Update</button>
							</div>
						</form>
						<div class="or"></div>
						<form method="POST" action="{{url("accounts/emails/")}}/{{$em->id}}">
							<input type="hidden" name="_method" value="DELETE">{{ csrf_field() }}
							<button class="negative ui button" type="submit">delete</button>
						</form>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection