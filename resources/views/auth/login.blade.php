@extends('base', ['fit_height' => true])

@section('title', "Se connecter")

@section('content')
    <div class="container d-flex h-100 align-items-center justify-content-center">
        <div class="">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <form class="vstack gap-3" action="{{ route('login') }}" method="post">
                @csrf
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email'])
                @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])

                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary">Se connecter</button>
                    <a href="{{ route('home') }}" class="btn btn-danger" title="Quitter">
                        <i class="bi bi-door-closed"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
