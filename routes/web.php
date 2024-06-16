<?php
// routes/web.php

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class)->middleware('auth');

Route::get('/trigger-404', function () {
    abort(404);
})->name('trigger-404');

Route::get('/trigger-500', function () {
    abort(500);
})->name('trigger-500');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
