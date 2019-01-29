@extends('layouts.app')


@section('content')
<div class="ui padded text container segment">
    <form method="POST" action="{{ route('login') }}" class="ui form">
        @csrf

        <div class="required field{{ $errors->has('username') ? ' error' : '' }}">
            <label>Username</label>

            <input type="text" name="username" placeholder="username">
            @if ($errors->has('username'))
                <span>{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
            <label>Password</label>
            <input type="password" name="password" placeholder="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" id="remember" tabindex="0" class="hidden">
                <label for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="ui button">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
               </a>
        @endif
        </div>
    </form>
</div>
@endsection