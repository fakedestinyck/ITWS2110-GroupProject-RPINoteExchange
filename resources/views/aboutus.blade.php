<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RPI Note Exchange - About Us</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color: #636b6f;
                font-weight: 600;
                font-size: 30px;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .intro {
                font-size:40px;
            }
            .info {
                font-size:25px;
            }
            .team {
                font-size:18px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/intro') }}">Intro</a>
                        <a href="https://github.com/fakedestinyck/ITWS2110-GroupProject-RPINoteExchange">GitHub Page</a>
                        @if (Auth::User()->isAdmin())
                            <a href="{{ url('/admin') }}">Dashboard</a>
                        @else
                            <a href="{{ url('/user') }}">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ url('/intro') }}">Intro</a>
                        <a href="https://github.com/fakedestinyck/ITWS2110-GroupProject-RPINoteExchange">GitHub Page</a>
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>


                    @endif
                </div>
                <div class="top-left title">
                    <a href="{{ url('/') }}">RPI NOTE EXCHANGE</a>
                </div>
            @endif

            <div class="content">
                <h2 class="intro">About Us</h2>
                <p class="info">Meet the Team:</p>
                <p class="team">Stephanie Tan</p>
                <p class="team">HaoChang Qian</p>
                <p class="team">Osama Minhas</p>
                <p class="team">Omer Osman</p>
                <p class="team">Silei Tian</p>
            </div>
        <div>
    </body>
</html>