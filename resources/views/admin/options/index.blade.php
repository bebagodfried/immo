@extends('admin.layouts')

@section('title', 'Toutes les options')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nom</td>
                <td class="text-end">Actions</td>
            </tr>
        </thead>

        <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Éditer</a>

                        <form action="{{ route('admin.option.destroy', $option) }}" method="post"
                              onsubmit="event.preventDefault(); confirm('Voulez-vous vraiment supprimer «{{ $option->name }}»?')">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $options->links() }}

@endsection
