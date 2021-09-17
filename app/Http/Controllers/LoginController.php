<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login', [
            'tittle' => 'Login',
            'footer' => 'no'
        ]);
    }

    public function login(Request $request)
    {
        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $level = DB::table('users')->where('email', $inputan['email'])->value('level');

        if ($level == 'admin') {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
    
            return back()->with('errorLogin', 'Login Gagal !');
        }
        if (Auth::attempt($inputan)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('errorLogin', 'Login Gagal !');

    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        
    }
}
