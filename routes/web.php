<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/sidebar-page', function () {
    return view('sidebar-page');
})->name('sidebar-page');
