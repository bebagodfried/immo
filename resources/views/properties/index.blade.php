@extends('base')

@section('title', ($filter)? "Recherche de biens" : "Tous nos biens")

@section('content')
    <div class="container mt-4">

        <div class="d-flex d-flex align-items-center justify-content-between mb-3">
            <h1 class="">@yield('title')</h1>

{{--            @dd($others)--}}
            <x-filter :filter="$filter" :input="$input" :misc="$others" />
        </div>

        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('properties.card')
                </div>
            @empty
                <div class="col text-center py-5">
                    <i class="bi bi-building-fill-slash fs-1"></i>
                    <p>Aucun Bien ne correspond à vôtre recherche</p>

                </div>

                <hr>
                <h2>Nos suggestions</h2>
                <div class="row">
                @foreach($others as $similar)
                    <div class="col-3 mb-4">
                        @include('properties.card', ['property' => $similar ])
                    </div>
                @endforeach
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection

