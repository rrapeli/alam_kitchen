<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});


Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/menu', function () {
    return view('menu.index');
});

Route::get('/', function () {
    return view('welcome');
});
