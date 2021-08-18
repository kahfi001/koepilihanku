<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home"
    ]);
});


Route::get('/product', function () {
    return view('shop', [
        "tittle" => "Product"
    ]);
});

Route::get('/product-details', function () {
    return view('product-details', [
        "tittle" => "Detail Product"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle" => "About"
    ]);
});

Route::get('/whistlist', function () {
    return view('whistlist', [
        "tittle" => "Whistlist"
    ]);
});