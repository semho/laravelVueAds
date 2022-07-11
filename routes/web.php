<?php

use App\Http\Controllers\MainController;


Route::get('/', function () {
    return view('ads.home');
});
Route::get('/list', [MainController::class, 'list']);
Route::get('/card/{id}', [MainController::class, 'show']);
