<div class="ui menu">
  <a class="item" href="{{ url('/') }}">Meetme</a>
  <div class="right menu">
    @auth
        <a class="item" href="{{ url('/home') }}">Home</a>
        @else
            <a class="item" href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a class="item"href="{{ route('register') }}">Register</a>
            @endif
    @endauth

  </div>
</div>