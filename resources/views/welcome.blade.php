<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usability Metrics</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" herf="/css/app.css"> -->

    <!-- Styles -->
    <style>
        html,
        body {
            color: white;
            font-family: 'Prompt', sans-serif;
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


        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: transparent;
            border: 2px solid white;
            color: #FFFFFF;
            text-align: center;
            font-size: 25px;
            padding: 15px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 3px;
        }

        .button span {
            font-family: 'Prompt', sans-serif;
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover {
            background-color: grey;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }


        .button1 {
            display: inline-block;
            border-radius: 4px;
            background-color: transparent;
            border: 2px solid black;
            color: black;
            text-align: center;
            font-size: 25px;
            padding: 15px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 3px;
        }

        .button1 span {
            font-family: 'Prompt', sans-serif;
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button1 span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button1:hover {
            background-color: grey;
        }

        .button1:hover span {
            padding-right: 25px;
        }

        .button1:hover span:after {
            opacity: 1;
            right: 0;
        }









            /* Create two equal columns that floats next to each other */
            .column {
                float: left;
                width: 31.5%;
                padding: 10px;
                height: 300px;
                /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;


            }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/document') }}">Document</a>
            <a href="#">About Us</a>

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

                <button class="button" style="vertical-align:middle" onclick="location.href='{{ route('login') }}'">
                    <span> Get Start </span>


                </button>

            </div>



        </div>
    </div>

    <br><br><br><br><br><br><br>



    <!-- กูทำอันนี้ -->

    <div class="content" style="color:black;">

        <div class="title m-b-md">
            What we can do?
        </div>

        <div class="row">

            <div class="column">
                <img src="/images/element/icon1.png" width="130" height="130">
                <h1> Tell the definition <br> of metric </h1>
                <h3> อธิบายวิธีการใช้ metrics และความ <br> หมายของ metrics รวมถึงการจัด <br>
                    เก็บของมูลต่าง ๆ ใน metrics นั้น ๆ </h3>
            </div>

            <div class="column">
                <img src="/images/element/icon2.png" width="130" height="130">
                <h1> Create your model </h1>
                <br>
                <h3> สร้าง model ของ metrics ที่เลือก <br> ขึ้นมาเพื่อใช้ในการประเมิน graphic <br> media </h3>
            </div>

            <div class="column">
                <img src="/images/element/icon3.png" width="123" height="123">
                <h1> Evaluate <br> graphic media </h1>
                <h3> ประเมิน graphic media จาก <br> metrics model และวิเคราะห์ผล <br>
                    ออกมาในรูปแบบ Usability report </h3>
            </div>

        </div>

        <div class="col-sm-6" style="column-width: 700px; font-size:20px;">

            <br><br><br>

            <button class="button1" style="vertical-align:middle" onclick="location.href='/document'">
                <a> All FEATURES </a>
            </button>

        </div>

    </div>

    <br><br><br><br><br><br>

</body>

<script src="js/app.js" charset="utf-8"></script>

</html>