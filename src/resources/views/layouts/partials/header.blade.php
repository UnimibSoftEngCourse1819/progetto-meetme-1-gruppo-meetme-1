<div class="ui container-fluid grid" id="menu-grid">
    <div class="computer only row">
        <div class="column">
            <div class="ui stackable secondary pointing small menu">
                <div class="item">
                    <img src="{{ asset('img/logo.jpg') }}">
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
        </div>
    </div>

    <div class="tablet mobile only row">
        <div class="column">
            <div class="ui top huge fixed borderless menu">
                <a id="mobile_item" class="item"><i class="bars icon"></i></a>
                <div class="header item">
                        MeetMe
                </div>
            </div>
        </div>
    </div>
</div>