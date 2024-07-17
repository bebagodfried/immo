<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->middleware('auth')->name('admin.')->group(
    function () {
        Route::resource('property', PropertyController::class)->except('show');
        Route::resource('option', OptionController::class)->except('show');
    }
);
