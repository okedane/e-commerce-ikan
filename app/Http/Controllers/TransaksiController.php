<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = transaksi::with(['user', 'produk'])->latest()->get();
       return view('backend.transaksi.index', compact('transaksi'));
    }
}