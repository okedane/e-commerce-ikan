<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;

class homeController extends Controller
{
    public function index(){
        $kategori = kategori::get();
        $allproduct = produk::all();
        return view('frontend.dashboard', compact('kategori', 'allproduct'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function all_product(){
        $allproduct = produk::all();
        return view('frontend.allproduct', compact('allproduct'));
    }

    public function shopdetails($id){
        $item = produk::findOrFail($id);
        return view('frontend.shopdetails', compact('item'));
    }

    public function checkout($id){
        $produk = produk::findOrfail($id);
        return view('frontend.checkout', compact('produk'));
    }

    public function shop($id){
        $kategori = kategori::findOrFail($id);
        $produk = produk::where('id_kategori', $id)->get();
        return view('frontend.shop', compact('produk', 'kategori'));
    }

}
