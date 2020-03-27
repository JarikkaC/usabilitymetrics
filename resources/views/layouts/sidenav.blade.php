<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Usability Metrics') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        
        a {
            color: black;
        }

        #app {
            font-family: 'Prompt', sans-serif;
        }

    </style>
</head>


<body>
    <div id="app">

        <v-row class="md-3" no-gutters>

            @if (Route::has('login'))
            @auth
            <leftnav-component username="{{ Auth::user()->username}}"></leftnav-component>
            @endif
            @endauth

            <v-col class="md-9">
                @yield('content')
            </v-col>

        </v-row>


    </div>







</body>

</html>