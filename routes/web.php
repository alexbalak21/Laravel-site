<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/sidebar', function () {
    return view('sidebar');
});
