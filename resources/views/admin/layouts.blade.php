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

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.getElementById('preview');
            img.src = e.target.result;
            img.style.display = 'block'; // Affiche l'image
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
