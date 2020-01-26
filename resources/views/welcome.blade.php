<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usability Metrics</title>

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

    .btn {
        border: 2px solid #CCA69A;
        background-color: #CCA69A;
        color: white;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 20px;
    }

    .default {
        border-color: #CCA69A;
        color: black;
    }

    .default:hover {
        border-color: #e7e7e7;
        background: #e7e7e7;
    }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="{{ url('/home') }}">Home</a>
            <a herf="#">Document</a>
            <a herf="#">About Us</a>

            <!-- as a member -->
            @if (Route::has('login'))
            @auth
            <a herf="#"> {{ Auth::user()->username }}</a>
            <a herf="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                {{ __('logout') }}
            </a>

            <!-- as a guest -->
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <!-- logout form -->

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="content">

            <div class="title m-b-md"> Usability Metrics for Graphic Media </div>

            <div class="col-sm-6" style="column-width: 700px; font-size:20px;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum maiores modi quidem veniam,
                expedita quis laboriosam, ullam facere adipisci,iusto, voluptate sapiente corrupti asperiores rem
                nemo numquam fuga ab at.

                <br><br>

                <button class="btn default"
                    style="font-size: 20px; font-family: 'Nunito', sans-serif; font-weight: bold; color: white;">
                    <a href="{{ route('login') }}"> Get Start </a>
                </button>

            </div>



        </div>
    </div>

</body>


<script src="js/app.js" charset="utf-8"></script>


</html>