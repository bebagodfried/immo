<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | Immo</title>
    <link href="{{ @asset('assets/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ @asset('assets/css/bootstrap/icons/font/bootstrap-icons.min.css') }}">

    <style>
        @layer demo {
            button {
                all: unset;
            }
        }
    </style>
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 px-5 mb-4 border-bottom">
        <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <i class="bi bi-buildings fs-5"></i>
            <span class="fs-4 fw-bold">Immo</span>
        </a>

        <div class="d-flex">
            <ul class="nav nav-pills gap-2">
                <li class="nav-item">
                    <a href="{{ route('property.index') }}"
                       class="nav-link @if(Route::is('property.index')) active @endif">Biens</a>
                </li>
            </ul>
        </div>
    </header>
    @yield('content')
</body>
</html>
