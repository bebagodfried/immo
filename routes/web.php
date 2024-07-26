<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Home : Liste des 4 derniers bien
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/**
 * List des biens
 */
Route::get('/biens', [\App\Http\Controllers\PropertyController::class, 'index'])
    ->name('property.index');

/**
 * Affichage d'un bien spécifique
 */
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->where([
    'slug' => '[a-z0-9\-]+',
    'property' => '[0-9]+'
])->name('property.show');

/**
 * Intéresser par un bien en particulier
 */
Route::post('/biens/{property}/contact', [\App\Http\Controllers\PropertyController::class, 'contact'])->where([
    'property' => '[0-9]+'
])->name('property.contact');

/**
 * Authentification
 * - Inscription
 * - Connection
 * - Déconnection
 */
Route::get('/register', [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [AuthController::class, 'doRegister']);

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);

Route::delete('/logout',    [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/**
 * Administration
 * - property (bien)
 * - option
 */
Route::prefix('admin')->middleware('auth')->name('admin.')->group(
    function () {
        Route::get('/', [PropertyController::class, 'index'])
            ->name('index');
        Route::resource('properties', PropertyController::class)
            ->except('show');
        Route::resource('options', OptionController::class)
            ->except('show');
        Route::post('/image/{image}', [ImageController::class, 'destroy'])
            ->name('image');
    }
);
