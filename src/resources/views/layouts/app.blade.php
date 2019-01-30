<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!---Semantic ui-->
    @yield('custom-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
    <style>
        #content {
            min-height: 100px;
        }
        .ui.grid{
            padding: 0 !important;
        }
        .pushable.segment{
            margin: 0 !important;
            border: 0 !important;
            box-shadow: none
        }

        .mobile.row .ui.top.huge.fixed.borderless.menu {
            border: 0
        }

        @media (max-width: 991px) {
            #menu-grid {
                width: 100%;
            }

            .pusher{
                padding-top: 5rem;
            }
        }
        .container{
            padding-top: 1rem;
        }
        #mobile_menu{
            padding-top: 3.54rem;
        }
    </style>
</head>
<body>
    @include('layouts.partials.header')

    <div class="ui pushable segment">
        <div class="ui sidebar vertical menu" id="mobile_menu">
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
        <div class="pusher">
            <main class="container">
                @yield('content')
            </main>
        </div>
    </div>

    @include('layouts.partials.footer')
    @yield('custom-scripts')
    <script>
        $('.ui.sidebar').sidebar({
            context: $('.ui.pushable.segment'),
            transition: 'overlay'
        }).sidebar('attach events', '#mobile_item');
    </script>
</body>
</html>
