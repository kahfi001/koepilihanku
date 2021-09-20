<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('google_id', $user->getId())->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => bcrypt('12345678'),
                    'username' => $user->getName(),
                    'level' => "user",
                    'google_id' => $user->getId(),
                ]);
                try {
                    Auth::login($newUser);
                } catch (\Throwable $th) {
                    //throw $th;
                    dd($th);
                }
                return redirect()->intended('/');
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
