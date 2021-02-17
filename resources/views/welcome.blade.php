<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img class="img-fluid" src="data:image/png;base64,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" alt="">
                <div class="title m-b-md">
                    Postfinance Payment test
                </div>

                <div class="links">
                    <a href="{{route('checkout-index')}}">Go to checkout</a>
                </div>
            </div>
        </div>
    </body>
</html>
