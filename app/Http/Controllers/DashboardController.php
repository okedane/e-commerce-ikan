<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahproduk = produk::count();
        $jumlahkategori = kategori::count();

        return view('dashboard', compact('jumlahproduk', 'jumlahkategori'));

    }
}