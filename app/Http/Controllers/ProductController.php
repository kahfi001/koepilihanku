<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Whistlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function frontend()
    {
        $products = Product::all();
        return view('shop', [
            "tittle" => "Produk",
            'footer' => 'yes'
        ], compact('products'));
    }

    public function create()
    {
        $productsTable = Product::all(); 
        return view('admin/upload-product', [
            "tittle" => "Produk",
            'footer' => 'yes'
        ], compact('productsTable'));
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName(); 
        $nama = $request->input('namaProduk');
        $kategori = $request->input('kategori');
        $penjelasan = $request->input('penjelasan');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');

        $request->file('gambar')->storeAs('public/foto-produk', $gambar);

        $produk = new Product();
        $produk->nama = $nama;
        $produk->kategori = $kategori;
        $produk->penjelasan_singkat = $penjelasan;
        $produk->deskripsi = $deskripsi;
        $produk->harga = $harga;
        $produk->gambar = $gambar;
        $produk->save();
        return redirect()->back();
    }

    public function addCart(Request $request)
    {
        $idUser = $request->input('idUser');
        $id = $request->input('id');
        $nama = $request->input('nama');
        $qty = $request->input('qty');
        $harga = $request->input('harga');

        $hargaCart = ($qty*$harga);

        $cart = new Cart();
        $cart->user_id = $idUser;
        $cart->product_id = $id;
        $cart->nama = $nama;
        $cart->qty = $qty;
        $cart->harga = $hargaCart;
        $cart->is_checkout = false;
        $cart->save();
        return redirect()->back();
    }
    public function addWhistlist(Request $request)
    {
        $idUser = $request->input('idUser');
        $id = $request->input('id');
        $nama = $request->input('nama');

        $whistlist = new Whistlist();
        $whistlist->user_id = $idUser;
        $whistlist->product_id = $id;
        $whistlist->nama = $nama;
        $whistlist->save();
        return redirect()->back();
    }

    public function show(Product $produk)
    {
        return view('product-details', [
            "tittle" => "Detail Product",
            'footer' => 'yes',
            "produk" => $produk,
            "related" => Product::latest()->paginate(4)
        ]);
    }
}
