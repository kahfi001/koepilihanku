<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "tittle" => "Home",
            'footer' => 'yes',
            "related" => Product::latest()->paginate(8)
        ]);
        
    }
}
