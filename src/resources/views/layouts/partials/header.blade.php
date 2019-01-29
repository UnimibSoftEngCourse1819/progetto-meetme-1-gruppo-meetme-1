<div class="ui secondary pointing small menu">
    <div class="item">
        <img src="/images/logo.png">
        </div>
    <a class="active item" href="{{ url('/') }}">MeetMe</a>
        <div class="right menu">
            @auth
                <div class="right menu">
                    <a class="item" href="{{ url('/home') }}">Dashboard</a>
                    <a class="item" href="{{ route('events.index') }}">Eventi</a>
                    <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> Logout </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @else
                @if (Route::has('register'))
                    <div class="item">
                        <a href="{{ route('register') }}" class="ui compact primary button">Sign up</a>
                    </div>
                @endif
                <div class="item">
                    <a href="{{ route('login') }}" class="ui compact button">Log-in</a>

                </div>
            @endauth

        </div>

</div>
