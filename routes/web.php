<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\UserAkses;
use App\Models\transaksi;
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
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Frontend
    Route::get('/dashboard', [homeController::class, 'index'])->name('dashboard.home')->middleware('userAkses:customer');
    Route::get('contact', [homeController::class, 'contact'])->name('contact')->middleware('userAkses:customer');
    Route::get('all-product', [homeController::class, 'all_product'])->name('all.product')->middleware('userAkses:customer');
    Route::get('shop-details/{id}', [homeController::class, 'shopdetails'])->name('shop.details')->middleware('userAkses:customer');
    Route::get('shop/{id}', [homeController::class, 'shop'])->name('shop')->middleware('userAkses:customer');

    // transaksi
    Route::get('checkout/{id}', [homeController::class, 'checkout'])->name('checkout')->middleware('userAkses:customer');
    Route::post('proses-co/{id}', [homeController::class, 'action_co'])->name('produk.checkout')->middleware('userAkses:customer');


    //backend 
    Route::get('dashboard/admin', [DashboardController::class, 'index'])->name('dashboard')->middleware('userAkses:admin');

    // kategori
    Route::get('kategori/index', [KategoriController::class, 'index'])->name('kategori.index')->middleware('userAkses:admin');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create')->middleware('userAkses:admin');
    Route::post('post/masukan-data', [KategoriController::class, 'action_create'])->name('kategori.action_create')->middleware('userAkses:admin');
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('userAkses:admin');
    Route::put('put/edit-data/{id}', [KategoriController::class, 'action_edit'])->name('kategori.action_edit')->middleware('userAkses:admin');
    Route::delete('delete/edit-data/{id}', [KategoriController::class, 'delete'])->name('kategori.delete')->middleware('userAkses:admin');

    // produk
    Route::get('produk/index/{id}', [ProdukController::class, 'index'])->name('produk.index')->middleware('userAkses:admin');
    Route::get('produk/create/{id}', [ProdukController::class, 'create'])->name('produk.create')->middleware('userAkses:admin');
    Route::post('store/product', [ProdukController::class, 'action_create'])->name('produk.action_create')->middleware('userAkses:admin');
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit')->middleware('userAkses:admin');
    Route::put('produk/edit-produk/{id}', [ProdukController::class, 'action_edit'])->name('produk.action_edit')->middleware('userAkses:admin');
    Route::delete('delete/produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete')->middleware('userAkses:admin');
     //transaksi
    Route::get('transaksi/index', [TransaksiController::class, 'index'])->name('produk.transaksi')->middleware('userAkses:admin');
    Route::get('generate-pdf', [PdfController::class, 'generatePDF'])->name('generate-pdf')->middleware('userAkses:admin');

    
});
