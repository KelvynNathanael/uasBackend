<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Baju;

class CartController extends Controller
{
    //dijalankan pertama kali supaya jika belum login akan login dulu
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view cart
    public function index(){
        $cartItems = Cart::with('baju')->where('user_id', auth()->id())->get();
        return view('cart.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        $request->validate([
            'baju_id' => 'required|exists:baju,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $user_id = auth()->id();
        $baju_id = $request->baju_id;
        $quantity = $request->quantity;
    
        $cartItem = Cart::where('user_id', $user_id)->where('baju_id', $baju_id)->first();
    
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'baju_id' => $baju_id,
                'quantity' => $quantity,
            ]);
        }
    
        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }
    
    

    public function removeFromCart($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        $cartItem->delete();
    
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
    
    public function addQuantity(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        $cartItem->quantity += 1;
        $cartItem->save();
    
        return redirect()->back()->with('success', 'Quantity added successfully!');
    }
    
    public function deductQuantity(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        $cartItem->quantity -= 1;
    
        if ($cartItem->quantity < 1) {
            return redirect()->back()->with('error', 'Quantity cannot be less than 1');
        }
    
        $cartItem->save();
    
        return redirect()->back()->with('success', 'Quantity deducted successfully!');
    }
    

}

