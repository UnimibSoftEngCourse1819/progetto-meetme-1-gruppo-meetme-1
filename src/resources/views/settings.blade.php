@extends('layouts.app')
@section('content')
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
	    	<input type="password" name="oldPassword" value="secret">
	  	</div>
	  	<div class="field">
	    	<label>Nuova password</label>
	    	<input type="password" name="password" value="secret">
	  	</div>
	  	<div class="field">
	    	<label>Ripeti nuova password</label>
	    	<input type="password" name="password_confirmation" value="secret">
	  	</div>
	<button class="ui button" type="submit">Update</button>
	</form>

	<p>Current emails:</p>
	@foreach($emails->all() as $em)
		<form method="POST" action="{{url("accounts/emails/")}}/'+em.id+'/delete"><input type="hidden" name="_method" value="DELETE">{{ csrf_field() }} <button type="submit"> delete</button></form>
		<p>{{$em->email}}</p>
	@endforeach
@endsection
