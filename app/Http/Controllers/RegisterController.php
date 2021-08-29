<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            'tittle' => 'Register',
            'footer' => 'no'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        $nama = $validated['nama'];
        $username = $validated['username'];
        $email = $validated['email'];
        $password = bcrypt($validated['password']);
        

        $user = new User();
        $user->name = $nama;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->status = "user";
        $user->save();

        return redirect('/');
        
    }
}
