<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;

class registerController extends Controller
{
    public function index()
    {
        return view('register',[
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'username' =>['required', 'min:3', 'max:15', 'unique:users'],
            'email' =>'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:20',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        
        Users::create($validatedData);
        return redirect('loginv')->with('success','');
    }
}
