<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $cart = DB::table('products')
        ->join('carts', 'products.id', '=', 'carts.product_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->select('carts.id', 'users.id', 'products.id', 'products.nama', 'products.gambar', 'carts.harga', 'carts.qty')
        ->where('carts.user_id', $user_id)
        ->where('carts.is_checkout', false)
        ->get();

        $total = DB::table('products')
        ->join('carts', 'products.id', '=', 'carts.product_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->where('carts.user_id', $user_id)
        ->where('carts.is_checkout', false)
        ->sum('carts.harga');

        $cartId = DB::table('carts')
        ->where('user_id', '=', $user_id)
        ->where('is_checkout', '=', false)
        ->value('id');

        return view('cart', [
            "tittle" => "Cart",
            'footer' => 'yes'
        ], compact('total'))->with('carts', $cart)->with('cartId', $cartId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
