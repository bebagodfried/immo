@extends('admin.layouts')

@section('title', $property->exists ? "Éditer un bien" : "Créé un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack g-2" action="{{ route( $property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('share.input', ['class'=> 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title ])

            <div class="col row">
                @include('share.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface ])
                @include('share.input', ['class' => 'col', 'name' => 'price', 'value' => $property->price ])
            </div>
        </div>

        @include('share.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description ])

        <div class="row">
            @include('share.input', ['class' => 'col', 'name' => 'rooms', 'label' => 'Pieces', 'value' => $property->rooms ])
            @include('share.input', ['class' => 'col', 'name' => 'bedrooms', 'label' => 'Chambres', 'value' => $property->bedrooms ])
            @include('share.input', ['class' => 'col', 'name' => 'floor', 'label' => 'Étage', 'value' => $property->floor ])
        </div>

        <div class="row">
            @include('share.input', ['class' => 'col', 'name' => 'address', 'label' => 'Address', 'value' => $property->address ])
            @include('share.input', ['class' => 'col', 'name' => 'city', 'label' => 'Ville', 'value' => $property->city ])
            @include('share.input', ['class' => 'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code ])
        </div>

        @include('share.checkbox', ['name' => 'sold', 'label' => 'Vendue', 'value' => $property->sold ])

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