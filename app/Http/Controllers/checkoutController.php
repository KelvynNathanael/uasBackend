<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function processCheckout(Request $request)
    {
        $request->validate([
            'baju_id' => 'required|exists:baju,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user_id = auth()->id();
        $baju_id = $request->baju_id;
        $quantity = $request->quantity;

            checkout::create([
                'user_id' => $user_id,
                'baju_id' => $baju_id,
                'quantity' => $quantity,
            ]);

        return redirect()->route('index');
    }
}
