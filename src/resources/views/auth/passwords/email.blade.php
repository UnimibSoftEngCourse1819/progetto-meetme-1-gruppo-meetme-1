@extends('layouts.app')

@section('content')
    <div class="ui padded text container segment">
        @if (session('status'))
            <div class="ui message success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="ui message error" role="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form class="ui form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                <label>Email</label>
                <input type="email" name="email" placeholder="email" value="{{ $email ?? old('email') }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <button class="ui button" type="submit">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>
@endsection