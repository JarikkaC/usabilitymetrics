<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    a{ 
        color: black;
    }
    </style>
</head>


<body>
    <div id="app">

        <v-toolbar dense>
            <v-toolbar-title>Usability Metrics</v-toolbar-title>

            <v-spacer></v-spacer>

            <span class="ml-3 text-uppercase">
                <a href="{{ url('/home') }}">Home</a>
            </span>
            <span class="ml-3 text-uppercase">
                <a href="{{ url('/example')}}">Document</a>
            </span>
            <span class="ml-3 text-uppercase">
                <a href="{{ url('/example') }}">About Us</a>
            </span>

            @if(Route::has('login'))
            @auth
            <span class="ml-3 text-uppercase">
                <a href="#">{{ Auth::user()->username }}</a>
            </span>

            <v-btn class="ml-3" flat color="#E1DCD6">
                <span>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                        {{ __('logout') }}
                    </a>
                </span>
            </v-btn>

            @else
            <v-btn class="ml-3" flat color="#E1DCD6">
                <span>
                    <a href="{{ route('login') }}">Login</a>
                </span>
            </v-btn>
            @if (Route::has('register'))
            <v-btn text class="ml-3" outlined color="#A8947D">
                <span>
                    <a href="{{ route('register') }}">Register </a>
                </span>
            </v-btn>
            @endif
            @endauth

            @endif

        </v-toolbar>

        <v-row class="md-3" no-gutters>
            <leftnav-component></leftnav-component>
            <v-col class="md-9">
                @yield('content')
            </v-col>
        </v-row>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


    </div>

</body>

</html>