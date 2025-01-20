<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //melihat
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

    //detil produts
    public function shopdetails($id){
        $item = produk::findOrFail($id);
        return view('frontend.shopdetails', compact('item'));
    }

    public function shop($id){
        $kategori = kategori::findOrFail($id);
        $produk = produk::where('id_kategori', $id)->get();
        return view('frontend.shop', compact('produk', 'kategori'));
    }

    //co
    public function checkout($id){
        $produk = produk::findOrfail($id);
        return view('frontend.checkout', compact('produk'));
    }

    public function action_co(Request $request, $id)

    {
        $produk = produk::findOrFail($id);

        $kategoriId = $produk->id_kategori; 

        if ($kategoriId != $request->input('id_kategori')) {
            return redirect()->back()->with('error', 'Produk tidak sesuai dengan kategori.');
        }


        if ($produk->stock <= 0) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }


        $produk->stock -= 1;
        $produk->save();

        transaksi::create([
            'id_user'     => auth()->id(), 
            'id_produk'   => $produk->id, 
        ]);


        return redirect()->route('checkout', ['id' => $produk->id])->with('success', 'Checkout berhasil, stok berkurang.');

    }

}
