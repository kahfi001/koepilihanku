<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            'tittle' => 'Register',
            'footer' => 'no'
        ]);
    }

    public function indexAdmin()
    {
        $tampilUser = User::all();
        return view('admin.users', [
            'tittle' => 'User'
        ], compact('tampilUser'));
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
        $user->level = "user";
        $user->save();

        // $request->session()->flash('success', 'Pendaftaran Berhasil, Silahkan login !');

        // return redirect('/login');

        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($inputan)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
    }

    public function tambahUser(Request $request)
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
        $user->level = "admin";
        $user->save();

        return redirect()->back();
        
    }


}
