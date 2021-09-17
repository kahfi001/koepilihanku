<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\DetailCheckout;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValue;

class CheckoutController extends Controller
{
    public function index()
    {
        $Uid = auth()->user()->id;
        $checkout = DB::table('checkouts')
        ->where('user_id', '=', $Uid)
        ->orderBy('checkouts.id', 'desc')
        ->limit(1)
        ->get();

        $no_checkout = DB::table('checkouts')
        ->where('user_id', '=', $Uid)
        ->where('is_paid', '=', false)
        ->orderBy('checkouts.id', 'desc')
        ->limit(1)
        ->value('no_checkout');

        $dataCheckout = DB::table('detail_checkouts')
        ->join('products', 'products.id', '=', 'detail_checkouts.product_id')
        ->select('products.gambar', 'detail_checkouts.nama_produk', 'detail_checkouts.qty', 'detail_checkouts.harga')
        ->where('detail_checkouts.no_checkout', '=', $no_checkout)
        ->where('detail_checkouts.user_id', '=', $Uid)
        ->get();

        return view('checkout', [
            "tittle" => "Checkout",
            'footer' => 'yes'
        ], compact('checkout'))->with('dataCheckout', $dataCheckout)->with('noCheckout', $no_checkout);
    }

    public function addCheckOut(Request $request)
    {
        $idUser = $request->input('idUser');
        $username = $request->input('username');
        $qty = $request->input('qty');
        $harga = $request->input('harga');

        $total = ($qty*$harga);

        $co = new Checkout();
        $co->user_id = $idUser;
        $co->username = $username;
        $co->total = $total;
        $co->is_paid = false;
        $co->is_from_cart = false;
        $co->save();

        $idProduk = $request->input('id');
        $namaProduk = $request->input('nama');
        $no_checkout = DB::table('checkouts')
        ->where('user_id', '=', $idUser)
        ->orderBy('checkouts.id', 'desc')
        ->limit(1)
        ->value('no_checkout');

        $cod = new DetailCheckout();
        $cod->no_checkout = $no_checkout;
        $cod->user_id = $idUser;
        $cod->product_id = $idProduk;
        $cod->nama_produk = $namaProduk;
        $cod->qty = $qty;
        $cod->harga = $total;
        $cod->save();


        return redirect()->intended('/checkout');
    }

    public function addCheckOutFromCart(Request $request)
    {
        $idUser = $request->input('idUser');
        $username = $request->input('username');
        $total = $request->input('total');

        $co = new Checkout();
        $co->user_id = $idUser;
        $co->username = $username;
        $co->total = $total;
        $co->is_paid = false;
        $co->is_from_cart = true;
        $co->save();

        $no_checkout = DB::table('checkouts')
        ->where('user_id', '=', $idUser)
        ->orderBy('checkouts.id', 'desc')
        ->limit(1)
        ->value('no_checkout');

        $carts = DB::table('carts')
        ->where('user_id', '=', $idUser)
        ->where('is_checkout', '=', false)
        ->get();

        foreach ($carts as $cart) {           
            $idProduk = $cart->product_id;
            $namaProduk = $cart->nama;
            $qty = $cart->qty;
    
            $cod = new DetailCheckout();
            $cod->no_checkout = $no_checkout;
            $cod->user_id = $idUser;
            $cod->product_id = $idProduk;
            $cod->nama_produk = $namaProduk;
            $cod->qty = $qty;
            $cod->harga = $cart->harga;
            $cod->save();
        }


        return redirect()->intended('/checkout');
    }

    public function addToPayment(Request $request)
    {
        $idUser = $request->input('id');
        $fromCart = DB::table('checkouts')
        ->where('user_id', '=', $idUser)
        ->orderBy('checkouts.id', 'desc')
        ->limit(1)
        ->value('is_from_cart');
        $no_checkout = $request->input('noCheckout');
        $total = $request->input('total');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $kota = $request->input('kota');
        $kodepos = $request->input('kodepos');
        $provinsi = $request->input('provinsi');
        $notelepon = $request->input('notelepon');

        if ($fromCart == true) {

            $pay = new Payment();
            $pay->id_user = $idUser;
            $pay->nama = $nama;
            $pay->no_checkout = $no_checkout;
            $pay->alamat = $alamat;
            $pay->kota = $kota;
            $pay->kodepos = $kodepos;
            $pay->provinsi = $provinsi;
            $pay->no_telpon = $notelepon;
            $pay->total = $total;
            $pay->status = 'Belum Dibayar';
            $pay->save();

            DB::table('carts')
            ->where('user_id', '=', $idUser )
            ->update(['is_checkout' => true]);

            return redirect()->intended('/payment');
        } else {
            $pay = new Payment();
            $pay->id_user = $idUser;
            $pay->nama = $nama;
            $pay->no_checkout = $no_checkout;
            $pay->alamat = $alamat;
            $pay->kota = $kota;
            $pay->kodepos = $kodepos;
            $pay->provinsi = $provinsi;
            $pay->no_telpon = $notelepon;
            $pay->total = $total;
            $pay->status = 'Belum Dibayar';
            $pay->save();

            return redirect()->intended('/payment');

        }
        

    }
}
