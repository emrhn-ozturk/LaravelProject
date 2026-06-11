<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            return redirect()->route('home');
        }
        
        return view('front.checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $totalAmount = 0;
        foreach (session('cart') as $details) {
            $totalAmount += $details['price'] * $details['quantity'];
        }

        Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_amount' => $totalAmount,
        ]);

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Siparişiniz başarıyla alındı! The Travel Tech ürünleriniz yola çıkmaya hazır.');
    }
}