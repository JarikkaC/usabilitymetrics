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
</head>






<body>
    <div id="app">
        <v-card color="grey lighten-4" flat height="200px" tile>
            <v-toolbar dense permanent fixed>
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
                <v-toolbar-title>Usability Metrics</v-toolbar-title>
                </v-toolbar-title>

                <v-spacer></v-spacer>



                <v-toolbar-item>

                    <v-list-title>

                        <v-list-title>
                            <v-list-title-content>

                                @guest
                                <v-list-title herf="{{ route('login') }}">{{ __('Login') }} </v-list-title>
                                <v-list-title herf="#">Document</v-list-title>
                                <v-list-title herf="#">About Us</v-list-title>
                                @if (Route::has('register'))

                                <v-list-title href="{{ route('register') }}">{{ __('Register') }}</v-list-title>
                                @endif

                                @else
                                <v-list-title herf="#"> {{ Auth::user()->name }} </v-list-title>
                                <v-list-title herf="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </v-list-title>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf

                                </form>

                                @endguest

                            </v-list-title-content>
                        </v-list-title>
                    </v-list-title>
                </v-toolbar-item>
            </v-toolbar>
        </v-card>

        <main class="my-4">
            @yield('content') 
        </main>
    </div>

</body>

</html>