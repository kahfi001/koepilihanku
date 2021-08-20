<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function frontend()
    {
        $products = Product::all();
        return view('shop', [
            "tittle" => "Produk"
        ], compact('products'));
    }

    public function create()
    {
        return view('admin/upload-product', [
            "tittle" => "Produk"
        ]);
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName(); 
        $nama = $request->input('namaProduk');
        $kategori = $request->input('kategori');
        $harga = $request->input('harga');

        $request->file('gambar')->storeAs('public/foto-produk', $gambar);

        $produk = new Product();
        $produk->nama = $nama;
        $produk->kategori = $kategori;
        $produk->harga = $harga;
        $produk->gambar = $gambar;
        $produk->harga_rupiah = '';
        $produk->save();
        return redirect()->back();
    }
}
