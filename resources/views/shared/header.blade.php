<header @class([
    'fixed-top' => (Route::is('home') || Route::is('login') || Route::is('register')),
    'd-none'    => (Route::is('login') || Route::is('register')),
    'navbar navbar-default navbar-trans navbar-expand-lg py-3 px-5'])>
    <x-logo />
    <x-nav />
</header>
