<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    public function index() {
        $kategori = Kategori::get();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'min:1|required|string'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('status', 'Kategori berhasil ditambah');
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'min:1|required|string'
        ]);
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('status', 'Kategori berhasil diubah');
    }

    public function destroy($id) {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('status', 'Kategori berhasil dihapus');
    }
}