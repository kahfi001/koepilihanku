<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhistlistController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $whistlist = DB::table('products')
                    ->join('whistlists', 'products.id', '=', 'whistlists.product_id')
                    ->join('users', 'users.id', '=', 'whistlists.user_id')
                    ->select('whistlists.id', 'users.id', 'products.id', 'products.nama', 'products.gambar', 'products.harga')
                    ->where('whistlists.user_id', $user_id)
                    ->get();
        return view('whistlist', [
            "tittle" => "Whistlist",
            'footer' => 'yes'
        ], compact('whistlist'));
    }
}
