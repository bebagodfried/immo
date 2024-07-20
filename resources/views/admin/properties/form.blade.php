@extends('admin.layouts')

@section('title', $property->exists ? "Éditer un bien" : "Créé un bien")

@section('content')

    <h1>@yield('title')</h1>
        <form class="vstack g-2"
              action="{{ route( $property->exists ? 'admin.biens.update' : 'admin.biens.store', $property) }}"
              method="post">
            @csrf
            @method($property->exists ? 'put' : 'post')

            <div class="row justify-content-between">
                <div class="col-7">
                    <div class="row">
                        @include('shared.input', ['class'=> 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title ])

                        <div class="col row">
                            @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface ])
                            @include('shared.input', ['class' => 'col', 'name' => 'price', 'value' => $property->price ])
                        </div>
                    </div>

                    @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description ])

                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pieces', 'value' => $property->rooms ])
                        @include('shared.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'value' => $property->bedrooms ])
                        @include('shared.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Étage', 'value' => $property->floor ])
                    </div>

                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'name' => 'address', 'label' => 'Address', 'value' => $property->address ])
                        @include('shared.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city ])
                        @include('shared.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code ])
                    </div>

                    @include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options->pluck('id'), 'multiple' => true, 'options' => $options ])
                    @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendue', 'value' => $property->sold ])
                </div>
                <div class="col-4">
                    {{ ($property->images ? "Modifier" : "Ajouter") . " des images" }}
                    {{ (true ? "Modifier" : "Ajouter") . " des images" }}
                    <ul class="list-group">
                        <li class="list-group-item">

                        </li>
                    </ul>
                </div>
            </div>

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
@endsection
