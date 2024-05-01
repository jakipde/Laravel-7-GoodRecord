<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BHTController;
use App\Http\Controllers\ProductController;

Route::get('/', 'ProductController@index');
Route::resource('products', 'ProductController');
Route::get('/fetch-bht-data', [BHTController::class, 'fetchBHTData'])->name('fetch-bht-data');
Route::get('/getProductCount', [ProductController::class, 'getProductCount']);