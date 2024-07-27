@extends('admin.layouts')

@section('title', $property->exists ? "Éditer un bien" : "Créé un bien")

@section('content')

    <h1>@yield('title')</h1>
    <div class="row justify-content-between">
        <div class="col-7">
            <form class="vstack g-2"
                  action="{{ route( $property->exists ? 'admin.properties.update' : 'admin.properties.store', $property) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @method($property->exists ? 'put' : 'post')

                    <div class="row">
                        @include('shared.input', ['class'=> 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title ])

                        <div class="col row">
                            @include('shared.input', ['class' => 'col', 'name' => 'surface', 'label' => 'Surface (m²)', 'value' => $property->surface ])
                            @include('shared.input', ['class' => 'col', 'name' => 'price', 'label' => 'Prix (xof)', 'value' => $property->price ])
                        </div>
                    </div>

                    @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description ])

                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pieces', 'value' => $property->rooms ])
                        @include('shared.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'value' => $property->bedrooms ])
                        @include('shared.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Étage', 'value' => $property->floor ])
                    </div>

                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'name' => 'address', 'label' => 'Adresse', 'value' => $property->address ])
                        @include('shared.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city ])
                        @include('shared.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code ])
                    </div>

                    @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options->pluck('id'), 'multiple' => true, 'options' => $options ])
                    @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendue', 'value' => $property->sold ])

                    <input type="file" name="image" id="images" class="d-none"  accept="image/*" onchange="previewImage(event)">

                <div class="">
                    <button class="btn btn-primary">
                        @if($property->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </form>
        </div>

        <div class="col-4">
            @if($property->sold)
                <blockquote class="alert alert-danger">Le bien est marqué comme vendu</blockquote>
            @endif

            @php
                $image = $property->image;
                $hasImage = $image;
            @endphp

            {{ ($hasImage ? "Modifier" : "Ajouter") . " des images" }}

            <ul class="list-group">
                @if($hasImage)
                <li class="list-group-item">
                    <form action="{{ route('admin.image', $image) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger position-absolute m-2">
                            <i class="bi bi-trash"></i>
                        </button>
                        <img id="preview" src="{{ asset($image->path) }}" alt="{{ $property->title }}" class="img-fluid rounded-3">
                    </form>
                </li>
                @else
                <li class="list-group-item">
                    <img id="preview" src="{{ asset('/assets/img/placeholder.webp') }}" class="img-fluid rounded-3" alt="preview">
                </li>
                @endif

                <li class="list-group-item d-flex align-items-center justify-content-center">
                    <label for="images" class="btn btn-primary align-middle w-100">
                        <i class="bi bi-cloud-upload fs-3"></i> <span class="fs-3 my-auto">{{ $hasImage ? "Update" : "Upload" }}</span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
@endsection
