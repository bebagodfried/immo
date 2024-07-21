<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | Immo</title>

    <link href="{{ @asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ @asset('assets/vendor/bootstrap/icons/font/bootstrap-icons.min.css') }}">
    <link href="{{ @asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ @asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        @layer demo {
            button {
                all: unset;
            }
        }
    </style>
</head>
