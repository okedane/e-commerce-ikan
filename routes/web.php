<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/home', function () {
    return redirect()->route('dashboard');
});
Route::middleware(['auth'])->group(function () {
    // Frontend
    Route::get('/', [homeController::class, 'index'])->name('dashboard.home');
    Route::get('contact', [homeController::class, 'contact'])->name('contact');
    Route::get('all-product', [homeController::class, 'all_product'])->name('all.product');
    Route::get('shop-details/{id}', [homeController::class, 'shopdetails'])->name('shop.details');
    Route::get('checkout/{id}', [homeController::class, 'checkout'])->name('checkout');
    Route::get('shop/{id}', [homeController::class, 'shop'])->name('shop');

    // Route::get('/', [homeController::class, 'shopdetails'])->name('shop.details');


    //backend 
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // kategori
    Route::get('kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('post/masukan-data', [KategoriController::class, 'action_create'])->name('kategori.action_create');
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('put/edit-data/{id}', [KategoriController::class, 'action_edit'])->name('kategori.action_edit');
    Route::delete('delete/edit-data/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    // produk
    Route::get('produk/index/{id}', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/create/{id}', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('store/product', [ProdukController::class, 'action_create'])->name('produk.action_create');
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/edit-produk/{id}', [ProdukController::class, 'action_edit'])->name('produk.action_edit');
    Route::delete('delete/produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
});
