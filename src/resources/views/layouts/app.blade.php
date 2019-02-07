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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" rel="stylesheet">
    @yield('custom-styles')

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
            box-shadow: none;
        }

        .mobile.row .ui.top.huge.fixed.borderless.menu {
            border: 0
        }

        #desktop-menu {
            background: white;
        }
        #mobile-menu{
            height:2.5rem;
        }

        #menu-mobile-icon{
            padding-top:2rem;
        }

        @media (max-width: 990px) {
            .pusher {
                padding-top: 10rem;
            }

            #desktop-menu {
                display: none;
            }
            #desktop-content{
                display:none;
            }
            #mobile-content{
                padding-top: -3rem;
            }
        }

        @media (min-width: 991px) {
            .pusher {
                padding-top: 5rem;
            }

            #mobile-menu {
                display: none;
            }
            #desktop-content{
                padding-top:1rem;
            }
            #mobile-content{
                display:none;
            }
        }
    </style>
</head>
<body>
    @include('layouts.partials.header')

    <div class="pusher">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
    @yield('custom-scripts')
    <script>
        $(document).ready(function () {
            $('#toc').sidebar({
                dimPage: true,
                transition: 'overlay',
                mobileTransition: 'uncover'
            });

            $('#toc').sidebar('attach events', '.launch.item');
        });
    </script>
</body>
</html>
