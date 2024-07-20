@extends('admin.layouts')

@section('title', $option->exists ? "Éditer une option" : "Créé une option")

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route( $option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['class'=> 'col', 'label' => 'Nom', 'name' => 'name', 'value' => $option->name ])

        <div class="">
            <button class="btn btn-primary">
                @if($option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
@endsection
