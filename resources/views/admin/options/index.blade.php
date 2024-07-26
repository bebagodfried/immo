@extends('admin.layouts')

@section('title', 'Toutes les options')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.options.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nom</td>
                <td class="text-end">Actions</td>
            </tr>
        </thead>

        <tbody>
        @forelse($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.options.edit', $option) }}" class="btn btn-primary">Éditer</a>

                        <form action="{{ route('admin.options.destroy', $option) }}" method="post">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center opacity-50">
                    <i class="bi bi-database-slash"></i> Aucune option ici
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $options->links() }}

@endsection
