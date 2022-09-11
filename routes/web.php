<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

Route::view('/', 'index');

Route::name('user.')->group(function(){
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', function(){
        if(Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    // Route::post('/login', []);

    // Route::get('logout', [])->name('logout');

    Route::get('/register', function(){
        if(Auth::check()) {
            return redirect(route('user.private'));
        }

        return view('register');
    })->name('register');

    // Route::post('/register', []);
});
