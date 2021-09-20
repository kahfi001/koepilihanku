<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class ProfilController extends Controller
{
    public function index()
    {
        $idUser = auth()->user()->id;
        $user = User::where('id', $idUser)->get();


        return view('profil', [
            "tittle" => "Profil",
            'footer' => 'yes',
        ], compact('user'));
    }
}
