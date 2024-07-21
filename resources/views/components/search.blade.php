@php

@endphp
<div class="click-closed">
    <div class="container bg-light p-5 my-5 rounded-3 position-relative">

        <button type="button"
                class="btn-close close-box-collapse"
                data-bs-toggle="collapse"
                data-bs-target="#immoSearch">
        </button>

        <h3 class="px-3 mb-3">Recherchez un biens</h3>
        <form action="{{ route('property.index') }}" method="get" class="container d-flex gap-2">

            <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{ $input['surface'] ?? null }}">
            <input type="number" placeholder="Nombre de chambres min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? null }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? null }}">
            <input type="text" placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? null }}">

            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>
</div>
