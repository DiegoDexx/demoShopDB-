<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el usuario y el producto
        $user = User::where('email', 'diegojspro@gmail.com')->first();
        $product = Product::where('name', 'iPhone XR')->first();

        // Crear el carrito
        $cart = Cart::create([
            'user_id' => $user->id,
            'status' => 'empty',
        ]);

        // Añadir el producto al carrito
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
    }
}