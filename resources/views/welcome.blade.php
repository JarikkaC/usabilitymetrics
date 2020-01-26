<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- <link rel="stylesheet" herf="/css/app.css"> -->

    <!-- Styles -->
    <style>
    html,
    body {

        color: white;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;

        background-image: url("https://cdn.pixabay.com/photo/2015/01/08/18/25/startup-593327_1280.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 65px;
    }

    .links>a {
        color: white;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
</head>

<body>

    <div class="flex-center position-ref full-height">

        <!-- as a member -->

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->Name }} <span class="caret"></span>
        </a>

        <a href="{{ url('/home') }}">Home</a>
        <a href="{{ url('/example') }}">Document</a>
        <a href="{{ url('') }}">About Us</a>

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="">Log Out</a>
            <!-- as a guest -->
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">

            <div class="title m-b-md"> Usability Metrics for Graphic Media </div>

            <div class="col-sm-6" style="column-width: 700px; font-size:20px;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum maiores modi quidem veniam,
                expedita quis laboriosam, ullam facere adipisci,iusto, voluptate sapiente corrupti asperiores rem
                nemo numquam fuga ab at.


            </div>

            <div id="app">
                <v-btn>Get Start</v-btn>
            </div>



        </div>

    </div>

</body>


<script src="js/app.js" charset="utf-8"></script>


</html>