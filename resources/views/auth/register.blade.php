@extends('base', ['fit_height' => true])

@section('title', "Configuration")

@section('content')
    <div class="container d-flex h-100 align-items-center justify-content-center">
        <div class="">
            <h1>@yield('title')</h1>

            @include('shared.flash')

            <form class="vstack gap-3" action="{{ route('register') }}" method="post">
                @csrf
                @include('shared.input', ['class' => 'col', 'name' => 'name', 'label' => 'Nom de l\'admin'])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email de l\'admin'])

                <div class="row">
                    @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])
                    @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password_confirmation', 'label' => 'Confirmation mot de passe'])
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary">Suivant <span class="bi bi-chevron-right"></span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
