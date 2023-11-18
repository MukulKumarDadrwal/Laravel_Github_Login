<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function github_redirect(){
       return  Socialite::driver('github')->redirect();
    }

    public function github_callback(){

        $user = Socialite::driver('github')->user();
        $auth = User::firstOrCreate(['email' => $user->email],[
            'name'=>$user->name,
            'password'=>'1234',
        ]);
        Auth::login($auth);
        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
