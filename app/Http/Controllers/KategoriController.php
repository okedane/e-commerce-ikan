<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        return view('backend.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('backend.kategori/create');
    }

    public function action_create(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        kategori::create($validated);

        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('backend.kategori.edit', compact('kategori'));
    }

    public function action_edit(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function delete($id)
    {
        $kategori = kategori::findOrfail($id);
        $kategori->delete();

        return back()->with('succes', 'data telah dihapus');
    }
}
