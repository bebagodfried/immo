<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="{{ @asset('assets/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('assets/css/bootstrap/icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">

    <link href="{{ @asset('assets/plugins/tom-select/stylesheet.css') }}" rel="stylesheet">
    <script src="{{ @asset('assets/plugins/tom-select/index.js') }}"></script>

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
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <i class="bi bi-buildings fs-5"></i>
        <span class="fs-4 fw-bold">Immo</span>
    </a>

    <div class="d-flex">
        <ul class="nav nav-pills gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.biens.index') }}"
                   class="nav-link @if(Route::is('admin.biens.index')) active @endif">Géré les biens</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.option.index') }}"
                   class="nav-link @if(Route::is('admin.option.index')) active @endif">Géré les options</a>
            <li>

            @auth
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                            <span hidden>Se déconnecter</span>
                            <i class="bi bi-door-open"></i>
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</header>

<div class="container pt-5">
    @include('shared.flash')
    @yield('content')
</div>

<script>
    new TomSelect('select[multiple]', {
        plugins: {
            remove_button:{
                title:'Supprimer cet option',
            }}
    });
</script>
</body>
</html>
