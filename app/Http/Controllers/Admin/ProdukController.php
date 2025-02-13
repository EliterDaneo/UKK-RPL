<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(10);
        return view('app.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('app.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:35',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,heic|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagePath = 'images/produk/' . $image->hashName();

            $image->storeAs('public/images/produk', $image->hashName());
        }

        Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'image' => $imagePath,
        ]);

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan');
    }
}
