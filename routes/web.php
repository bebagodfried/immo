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
Route::get('/property', [\App\Http\Controllers\PropertyController::class, 'index'])
    ->name('property.index');

/**
 * Affichage d'un bien spécifique
 */
Route::get('/property/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->where([
    'slug' => '[a-z0-9\-]+',
    'property' => '[0-9]+'
])->name('property.show');

/**
 * Authentification & déconnection
 */
Route::get('/login',        [AuthController::class, 'login'])
    ->name('login');

Route::post('/login',       [AuthController::class, 'doLogin']);

Route::delete('/logout',    [AuthController::class, 'logout'])
    ->name('logout');

/**
 * Administration
 */
Route::prefix('admin')->middleware('auth')->name('admin.')->group(
    function () {
        Route::resource('property', PropertyController::class)->except('show');
        Route::resource('option', OptionController::class)->except('show');
    }
);
