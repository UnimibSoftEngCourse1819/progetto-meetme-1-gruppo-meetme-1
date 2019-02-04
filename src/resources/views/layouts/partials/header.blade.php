<div class="ui vertical sidebar menu" id="toc">
    <a class="active item" href="{{ url('/') }}">Home</a>
    @auth
        <a class="item" href="{{ url('/home') }}">Dashboard</a>
        <a class="item" href="{{ route('events.index') }}">Eventi</a>
        <a class="item" href="{{ route('account.settings') }}">Settings</a>
        <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @else
        <a href="{{ route('register') }}" class="item">Sign up</a>
        <a href="{{ route('login') }}" class="item">Log-in</a>
    @endauth
</div>

<div class="ui top fixed secondary pointing small menu" id="desktop-menu">
    <div class="item">
        <img src="{{ asset('img/logo.png') }}">
    </div>
    <a class="active item" href="{{ url('/') }}">MeetMe</a>
    <div class="right menu">
        @auth
            <div class="right menu">
                <a class="item" href="{{ url('/home') }}">Dashboard</a>
                <a class="item" href="{{ route('events.index') }}">Eventi</a>
                <a class="item" href="{{ route('account.settings') }}">Settings</a>
                <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @else
            <div class="item">
            <div class="ui mini buttons">
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    <button class="mini ui black button">
                            Sign up
                    </button>
                </a>
            <div class="or"></div>
            @endif
                <a href="{{ route('login') }}" >
                <button class=" mini ui  button">
                    Log-in
                </button></a>
            </div></div>
        @endauth
    </div>
</div>

<div class="ui top fixed borderless main menu" id="mobile-menu">
        <a class="launch icon item">
            <i class="content icon"></i>
        </a>
    <div class="header item">
        MeetMe
    </div>
</div>
