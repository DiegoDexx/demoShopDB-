<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Requests\CartItemRequest;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /*show by cart_id */
public function showByCartId(string $cart_id)
{
    $cartItems = CartItem::with('product')  // 👈 traer también la info del producto
        ->where('cart_id', $cart_id)
        ->get();

    return response()->json(['cartItems' => $cartItems]);
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(CartItemRequest $request)
    {
        $cartItem = CartItem::create($request->all());
        return response()->json(['cartItem' => $cartItem], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $request->validate(
            [  
                'cart_id' => 'required|exists:carts,id',
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]
        );

        if( $cartItem ) {
            $cartItem->update($request->all());
            return response()->json(['cartItem'=> $cartItem],0);
        }else{
            //devilver un mensaje de error
            return response()->json(['message' => 'CartItem not found'], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return response()->json(['message' => 'CartItem deleted successfully']);
    }
}