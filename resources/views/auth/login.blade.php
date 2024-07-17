@extends('base')

@section('title', "Se connecter")

@section('content')

    <h1>@yield('title')</h1>

    @include('shared.flash')

    <form class="vstack gap-3" action="{{ route('login') }}" method="post">
        @csrf
        @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email'])
        @include('shared.input', ['type' => 'password', 'class' => 'col', 'name' => 'password', 'label' => 'Mot de passe'])

        <div class="">
            <button class="btn btn-primary">Se connecter</button>
        </div>
    </form>
@endsection
