<!doctype html>
<html lang="fr" @class(['h-100' => @$fit_height ])>
@include('shared.head')
<body class="">
    @include('shared.header')

    <x-search />
    @yield('content')

    <footer class="footer mt-auto py-3 bg-body-tertiary position-absolute w-100 bottom-0">
        <b>&copy; immo.</b> by @bebagodfried
    </footer>

    <!-- Vendor JS Files -->
    <script src="{{ @asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ @asset('assets/js/main.js') }}"></script>
</body>
</html>
