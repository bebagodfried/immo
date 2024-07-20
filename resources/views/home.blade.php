@extends('base')

@section('title', "Tous nos biens")

@section('content')

    <div class="intro intro-carousel swiper position-relative">

        <div class="swiper-wrapper">
        @foreach($properties as $property)
            @include('properties.slide')
        @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-4">
            <h2 class="">Nos derniers biens</h2>

            <a href="{{ route('property.index') }}" class="link-primary">Tous nos biens&nbsp;<i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row">
            @foreach($properties as $property)
            <div class="col">
                @include('properties.card')
            </div>
            @endforeach
        </div>
    </div>
@endsection
