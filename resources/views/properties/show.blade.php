@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-between">
            <ul class="col-7 bg-light rounded shadow p-0 m-0 overflow-hidden">
                <li class="h-100 w-100"
                    style="
                        background-image: url({{ @asset('assets/img/' . ($property->image ?? 'placeholder.webp')) }});
                        background-size:cover
                    ">
                </li>
            </ul>

            <div class="col-4">
                <h1>{{ $property->title }}</h1>
                <h2 class="text-black-50">{{ $property->rooms }} pieces - {{ $property->surface }} m²</h2>

                <div class="text-primary fw-bold" style="font-size: 4rem;">
                    {{ number_format($property->price, thousands_separator: ' ') }} XOF
                </div>

                <hr>

                <div class="mt-4">
                    <h4>Intéresser par ce bien?</h4>

                    @include('shared.flash')

                    <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                        @csrf

                        <div class="row">
                            @include('shared.input', ['class'=> 'col', 'label' => 'Prénom', 'name' => 'firstname'])
                            @include('shared.input', ['class'=> 'col', 'label' => 'Nom', 'name' => 'lastname'])
                        </div>

                        <div class="row">
                            @include('shared.input', ['class'=> 'col', 'label' => 'Téléphone', 'name' => 'phone'])
                            @include('shared.input', ['type' => 'email', 'class'=> 'col', 'label' => 'Email', 'name' => 'email'])
                        </div>

                        @include('shared.input', ['type' => 'textarea', 'class'=> 'col', 'label' => 'Votre message', 'name' => 'message'])

                        <div class="mt-4">
                            <button class="btn btn-primary">
                                Nous contacter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <p>{!! nl2br($property->description) !!}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }}</td>
                        </tr>

                        <tr>
                            <td>Pieces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>

                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>

                        <tr>
                            <td>Étage</td>
                            <td>{{ $property->floor ?: "Rez de chausser" }}</td>
                        </tr>

                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} <br>
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                    @foreach($property->options as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
