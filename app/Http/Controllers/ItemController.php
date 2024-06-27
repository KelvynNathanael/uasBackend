<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;
use App\Models\Checkout;

class ItemController extends Controller
{
    public function manageItems()
    {
        $bajus = Baju::orderBy('id', 'asc')->get(); // Fetch all baju from the database
        return view('admin.manageItems', compact('bajus')); // Pass the bajus to the view
    }
    public function checkout()
    {
        $checkouts = checkout::orderBy('id', 'asc')->get(); // Fetch all baju from the database
        return view('admin.checkout', compact('checkouts')); // Pass the bajus to the view
    }
}