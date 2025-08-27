<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::with('items')->get();
        return response()->json(['carts' => $carts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {
        $cart = Cart::create($request->all());
        return response()->json(['cart' => $cart], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = Cart::with('items')->findOrFail($id);
        return response()->json(['cart' => $cart]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = Cart::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string|in:empty,completed',
        ]);


        if($cart){
        $cart->update($request->all());
        return response()->json(['cart' => $cart]);
        } else {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);

        if($cart) {
        $cart->delete();
        return response()->json(['message' => 'Cart deleted successfully']);
        } else {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }
}