<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Whistlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function frontend()
    {
        return view('shop', [
            "tittle" => "Produk",
            'footer' => 'yes',
            "products" => Product::latest()->filter()->paginate(12)
        ]);
    }

    public function create()
    {
        return view('admin/upload-product', [
            "tittle" => "Produk",
            'footer' => 'yes',
            "productsTable" => Product::latest()->paginate(5),
        ]);
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName(); 
        $nama = $request->input('namaProduk');
        $penjelasan = $request->input('penjelasan');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');

        $request->file('gambar')->storeAs('public/foto-produk', $gambar);

        $produk = new Product();
        $produk->nama = $nama;
        $produk->kategori = 'Bubuk Kopi';
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
        return redirect()->intended("/product/$nama");
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

    public function viewUpdate(Product $produk)
    {
        return view('admin/update-product', [
            'tittle' => 'Update Product',
            'footer' => 'yes',
            'produk' => $produk
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('namaProduk');
        $penjelasan = $request->input('penjelasan');
        $harga = $request->input('harga');
        $deskripsi = $request->input('deskripsi');
        $gambar = $request->file('gambar')->getClientOriginalName();

        $request->file('gambar')->storeAs('public/foto-produk', $gambar);

        DB::table('products')
        ->where('id', $id)
        ->update([
            'nama' => $nama,
            'penjelasan_singkat' => $penjelasan,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->intended('/product-admin');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        DB::table('products')
        ->where('id', $id)
        ->delete();
        return redirect('/product-admin');

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
