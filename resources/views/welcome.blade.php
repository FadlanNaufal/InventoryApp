<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .kotak{
                width: 100%;
                height: 200px;
                opacity: 50%;
                border-radius: 20px;
                background-color: green;
            }
            html, body {
                background-image: url('assets/wk.jpg');
                filter: grayscale(100%);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
                color: white;
            }

            .links > a {
                color: white;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

                <div class="top-right links">
                   <h3 style="color: white">{{date('D-y-m-d')}}</h3>
                </div>

            <div class="content">
               <div class="kotak">
                    <div class="title m-b-md">
                    Welcome To Inventory App
                    </div>

                    <div class="links">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('show') }}">Login Employee</a>
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                        @endif
                    </div>
               </div>
            </div>
        </div>
    </body>
</html>
