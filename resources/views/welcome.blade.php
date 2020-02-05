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

        /* กูเริ่มทำอันนี้ */
        .btn1 {
            border: 2px solid white;
            background-color: white;
            color: white;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;

        }

        .default1 {
            border-color: black;
            color: black;
        }

        .default1:hover {
            border-color: black;
            background: #e7e7e7;
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

                <button class="btn default" style="font-size: 20px; font-family: 'Nunito', sans-serif; font-weight: bold; color: white;">
                    <a href="{{ route('login') }}"> Get Start </a>
                </button>

            </div>



        </div>
    </div>

    <br><br><br><br><br><br><br>


    
    <!-- กูทำอันนี้ -->

    <div class="content" style="color:black;">

        <div class="title m-b-md" style="font-family: 'Nunito', sans-serif; font-weight: bold;">
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

            <button class="btn1 default1" style="font-size: 20px; font-family: 'Nunito', sans-serif; font-weight: bold; color:black;">
                <a> All FEATURE </a>
            </button>

        </div>

    </div>

    <br><br><br><br><br><br>

</body>

<script src="js/app.js" charset="utf-8"></script>

</html>