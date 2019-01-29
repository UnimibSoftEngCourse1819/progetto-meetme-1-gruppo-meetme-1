@extends('layouts.app')




@section('content')
    <div class="ui padded text container segment">
        <form class="ui form" method="POST" action="{{ route('password.update') }}">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="required field {{ $errors->has('email') ? ' error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email" value="{{ $email ?? old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="field{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password" ">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="field{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" name="password_confirmation" id="password-confirm" >
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button class="ui button" type="submit">{{ __('Reset Password') }}</button>
            </form>
    </div>
@endsection
