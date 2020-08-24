<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController');
Route::prefix('{resource}')->name('resource.')->group(function () {
    Route::get('/', 'ResourceController@index')->name('index');
});
