<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DaftarTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WhistlistController;
use App\Models\Cart;
use App\Models\Payment;

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


// ROUTE untuk user

Route::get('/', [HomeController::class, 'index']);


Route::get('/product',  [ProductController::class, 'frontend']);


Route::get('/about', function () {
    return view('about', [
        "tittle" => "About",
        'footer' => 'yes'
    ]);
});



// Route::get('/whistlist', [WhistlistController::class, 'index']);

Route::group(['middleware'=> ['auth', 'CekLevel:user']], function(){

    Route::get('/profil', [ProfilController::class, 'index']);
    
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'destroy']);
    
    Route::get('/daftar-transaksi', [DaftarTransaksiController::class, 'index']);
    
    Route::get('/payment/{py:no_payment}', [PaymentController::class, 'index']);
    Route::post('/add-to-payment', [CheckoutController::class, 'addToPayment']);
    Route::post('/payment', [PaymentController::class, 'updatePayment']);
    
    Route::get('/checkout/{cout:no_checkout}', [CheckoutController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'addCheckOut']);
    Route::post('/checkout-carts', [CheckoutController::class, 'addCheckOutFromCart']);
    
    Route::get('/product/{produk:nama}', [ProductController::class, 'show']);
    Route::post('/add-to-cart', [ProductController::class, 'addCart']);
    
    Route::get('/success', function () {
        return view('succes');
    });
});


// ROUTE untuk admin

Route::group(['middleware'=> ['auth', 'CekLevel:admin']], function() {
    Route::get('/admin', [DashboardController::class, 'tampil']);
    Route::get('/user', [RegisterController::class, 'indexAdmin']);
    Route::post('/user', [RegisterController::class, 'tambahUser']);
    
    Route::get('/product-admin', [ProductController::class, 'create']);
    Route::post('/product-admin', [ProductController::class, 'store']);
});

// ROUTE untuk Authentication

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


