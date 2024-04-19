<?php

use Illuminate\Support\Facades\Route;


Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});