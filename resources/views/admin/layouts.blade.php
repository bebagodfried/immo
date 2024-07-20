<!doctype html>
<html lang="fr">
<x-head>
    <link href="{{ @asset('assets/plugins/tom-select/stylesheet.css') }}" rel="stylesheet">
    <script src="{{ @asset('assets/plugins/tom-select/index.js') }}"></script>
</x-head>
<body>
    @include('shared.header')


<div class="container pt-5">
    @include('shared.flash')
    @yield('content')
</div>

<script>
    new TomSelect('select[multiple]', {
        plugins: {
            remove_button:{
                title:'Supprimer cet option',
            }}
    });
</script>
</body>
</html>
