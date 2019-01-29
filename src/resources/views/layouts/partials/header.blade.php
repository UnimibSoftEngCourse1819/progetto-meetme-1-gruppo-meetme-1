<div class="ui borderless secondary pointing small menu">
    <div class="item"><img src="/images/logo.png"></div>
    <a class="active item" href="{{ url('/') }}">MeetMe</a>
    <div class="right menu">
        <div class="stretched collapsed row">
            @auth
                <a class="item" href="{{ url('/home') }}">Dashboard</a>
                <a class="item" href="{{ route('events.index') }}">Eventi</a>

            @else
                @if (Route::has('register'))
                    <div class="item">

                        <a href="{{ route('register') }}" class="ui compact primary button">Sign up</a>

                    </div>
                @endif

                <di class="item">
                    <a href="{{ route('login') }}" class="ui compact button">Log-in</a>

                </div>
            @endauth
        </div>
    </div>
</div>
