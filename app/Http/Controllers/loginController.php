<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login',[
        ]);
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'username' =>['required', 'min:3', 'max:15'],
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request -> session()-> regenerate();

            return redirect()->intended('/dashboardv');
        }

        return back()->with('loginError', 'login failed');
    }


}
