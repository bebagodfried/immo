@extends('admin.layouts')

@section('title', 'Toute les biens')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Titre</td>
                <td>Surface</td>
                <td>Prix</td>
                <td>Ville</td>
                <td class="text-end">Actions</td>
            </tr>
        </thead>

        <tbody>
        @forelse($properties as $property)
            <tr>
                <td>{{ $property->title }}</td>
                <td>{{ $property->surface }}m²</td>
                <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                <td>{{ $property->city }}</td>
                <td>
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                        @if($property->sold)
                            <div class="badge text-danger">vendu</div>
                        @endif

                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-primary">Éditer</a>

                        <form action="{{ route('admin.properties.destroy', $property) }}" method="post">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center opacity-50">
                    <i class="bi bi-building-fill-slash"></i> Aucun bien ici
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $properties->links() }}

@endsection
