<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
        "tittle" => "Home",
        'footer' => 'yes'
    ]);
});


Route::get('/product',  [ProductController::class, 'frontend']);

Route::get('/product-details', function () {
    return view('product-details', [
        "tittle" => "Detail Product",
        'footer' => 'yes'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle" => "About",
        'footer' => 'yes'
    ]);
});

Route::get('/whistlist', function () {
    return view('whistlist', [
        "tittle" => "Whistlist",
        'footer' => 'yes'
    ]);
});

Route::get('/product-admin', [ProductController::class, 'create']);

Route::post('/product-admin', [ProductController::class, 'store']);

Route::get('/admin', [DashboardController::class, 'tampil']);

Route::get('/login', [LoginController::class, 'index']);



Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);
