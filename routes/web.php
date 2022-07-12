<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SpaController;

/** редирект фронтенд */
Route::get('/', function () {
    return view('ads.home');
});
Route::get('/list/{id}', function () {
  return view('ads.home');
});
Route::get('/card_create', function () {
  return view('ads.home');
});
//Route::post('/card_create', function () {
//  return view('ads.home');
//});

/** роуты запросов на бэкенд */
Route::get('/list', [MainController::class, 'list']);
Route::get('/card/{id}', [MainController::class, 'show']);
Route::post('/card/create', [MainController::class, 'store']);
