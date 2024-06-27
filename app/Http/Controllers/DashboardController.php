<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $bajus = Baju::orderBy('id', 'asc')->get();
        return view('homepage',compact('bajus'));
    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 
        return redirect('/');

    }
}
