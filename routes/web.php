<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'u.'], function () {

    Route::controller(DashboardController::class)->prefix('dashboard')->name('d.')->group(function () {
        Route::get('index', 'index')->name('index');
    });
});
