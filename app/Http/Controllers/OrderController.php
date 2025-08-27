<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json(['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create($request->all());
        return response()->json(['order' => $order], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json(['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,completed,canceled',
            'address_id' => 'required|exists:addresses,id',
        ]);

        try {
            $order = Order::findOrFail($id); // Lanza una excepción si no encuentra la orden

            $order->update($request->all());

            if ($order->wasChanged()) {
                return response()->json(['message' => 'Order updated successfully', 'order' => $order], 200);
            } else {
                return response()->json(['message' => 'No changes were made to the order, invalidad inputs'], 200);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Order not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        if( $order ) {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        }else{
            return response()->json(['message' => 'Order not found'], 404);
        }
    }
}