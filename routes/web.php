<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::middleware('auth')->group(function () {
        });



        require __DIR__ . '/auth.php';
    }
);
Route::get('/', function () {
    return view('frontend.pages.index');
});