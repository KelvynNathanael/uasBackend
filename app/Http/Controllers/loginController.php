<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index() {
        return view('auth.login'); 
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'username' =>['required', 'min:3', 'max:15'],
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request -> session()-> regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'login failed');
    }

}