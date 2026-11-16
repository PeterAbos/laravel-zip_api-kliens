<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountiesController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('counties', CountiesController::class);

Route::get('/set-locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
})->name('/');
