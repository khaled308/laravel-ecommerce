<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
});

Route::get('/', function () {
    return view('frontend.pages.index');
});



require __DIR__ . '/auth.php';