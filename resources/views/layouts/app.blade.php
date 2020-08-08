<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Big Bro's Cafe & Restro</title>
    <link href="{{ asset('logoico.png') }}" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <style href="{{ asset('css/stripe.css') }}"></style> -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #24252a;
        }

        .banned {
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100px;
        }

        .pulse {
            animation-name: pulse_animation;
            animation-duration: 5000ms;
            transform-origin: 70% 70%;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes pulse_animation {
            0% {
                transform: scale(1);
            }

            30% {
                transform: scale(1);
            }

            40% {
                transform: scale(1.08);
            }

            50% {
                transform: scale(1);
            }

            60% {
                transform: scale(1);
            }

            70% {
                transform: scale(1.05);
            }

            80% {
                transform: scale(1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    @notifyCss
</head>

<body>
    <div id="app">
        <main-navbar></main-navbar>
        @yield('content')
        <main-footer></main-footer>
        <img src="{{ asset('images/banned.png') }}" class="banned pulse" />
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/stripe.js') }}"></script> -->

    @include('notify::messages')
    @notifyJs
</body>

</html>
