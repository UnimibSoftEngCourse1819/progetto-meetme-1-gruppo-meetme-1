@extends('layouts.app')



@section ('content')
<div class="ui padded text container segment">
    <form class="ui form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="required field {{ $errors->has('username') ? ' error' : '' }}">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username" value="{{ old('username') }}">

            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

        <div class="required field {{ $errors->has('first_name') ? ' error' : '' }}">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="required field {{ $errors->has('last_name') ? ' error' : '' }}">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="required field {{ $errors->has('email') ? ' error' : '' }}">
            <label for="email">Email</label>

            <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('email') }}</strong>
             </span>
            @endif
        </div>

        <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" placeholder="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <button class="ui button" type="submit">Submit</button>
    </form>
</div>
@endsection