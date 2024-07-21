<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Home: Liste des 4 derniers biens
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/**
 * Listing des biens
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
 * Contact concernant bien spécifique
 */
Route::post('/biens/{property}/contact', [\App\Http\Controllers\PropertyController::class, 'contact'])->where([
    'property' => '[0-9]+'
])->name('property.contact');

/**
 * Authentification & déconnection
 */
Route::get('/login',        [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::get('/register',     [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/login',       [AuthController::class, 'doLogin']);
Route::post('/register',    [AuthController::class, 'doRegister']);

Route::delete('/logout',    [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/**
 * Administration
 */
Route::prefix('admin')->middleware('auth')->name('admin.')->group(
    function () {
        Route::get('/', [PropertyController::class, 'index'])->name('index');
        Route::resource('properties', PropertyController::class)->except('show');
        Route::resource('options', OptionController::class)->except('show');
    }
);
