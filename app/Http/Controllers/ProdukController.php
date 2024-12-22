<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index(Request $request, $id)
    {
        $kategori = kategori::findOrFail($id);
        $produk = produk::where('id_kategori', $id)->get();
        return view('backend.produk.index', compact('produk', 'kategori'));
    }

    public function create($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('backend.produk.create', compact('kategori'));
    }

    public function action_create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_produk' => 'required|string|max:255',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
                'deskripsi' => 'required|string|max:500',
                'harga' => 'required|integer',
                'stock' => 'required|integer',
                'id_kategori' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $imageName = $gambar->hashName();
            $gambar->storeAs('public/upload/produk', $imageName);
        }
        // dd($request->all());
        produk::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => $imageName,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_kategori' => $request->id_kategori,
        ]);



        return redirect()->route('produk.index', $request->id_kategori)->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $produk = produk::findOrFail($id);
        return view('backend.produk.edit', compact('produk'));
    }

    public function action_edit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_produk' => 'required|string|max:255',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'required|string|max:500',
                'harga' => 'required|integer',
                'stock' => 'required|integer',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $produk = Produk::findOrFail($id);
        $id_kategori = $produk->id_kategori; // Ambil id_kategori dari produk yang sedang diedit
        $imageName = $produk->gambar;

        if ($request->hasFile('gambar')) {
            if ($imageName && Storage::exists('public/upload/produk/' . $imageName)) {
                Storage::delete('public/upload/produk/' . $imageName);
            }

            $imageFile = $request->file('gambar');
            $imageName = $imageFile->hashName();
            $imageFile->storeAs('public/upload/produk', $imageName);
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'gambar' => $imageName,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_kategori' => $id_kategori, // Tetapkan id_kategori tanpa input
        ]);

        return redirect()->route('produk.index', ['id' => $id_kategori])->with('success', 'Data Berhasil Diedit');

    }

    public function delete($id)
    {
        $produk = produk::findOrfail($id);
        $produk->delete();

        return back()->with('succes', 'data telah dihapus');
    }
}
