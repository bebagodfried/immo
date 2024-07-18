@extends('base')

@section('title', "Tous nos biens")

@section('content')
    <div class="container">

        <div class="bg-light p-5 mb-5 text-center">
            <form action="" method="get" class="container d-flex gap-2">
                <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{ $input['surface'] ?? null }}">
                <input type="number" placeholder="Nombre de chambres min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? null }}">
                <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? null }}">
                <input type="text" placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? null }}">

                <button class="btn btn-primary btn-sm flex-grow-0">
                    Rechercher
                </button>
            </form>
        </div>



        <div class="row">
            @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('properties.card')
                </div>
            @empty
                <div class="col text-center">
                    Aucun Bien ne correspond à vôtre recherche
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection

