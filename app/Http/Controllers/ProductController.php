<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //
        $product = Product::create($request->all());
       
        return response()->json(['product'=> $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return response()->json(['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);
        
        $request ->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ],
        [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
            'category.required' => 'The category field is required.',
            'state.required' => 'The state field is required.',
            'image.max' => 'The image field must not exceed 255 characters.',
            'brand.max' => 'The brand field must not exceed 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'price.min' => 'The price field must be at least 0.',
            'stock.required' => 'The stock field is required.',
            'stock.integer' => 'The stock field must be an integer.',
            'stock.min' => 'The stock field must be at least 0.',
        ]);
       
        try{
            $product = Product::findOrFail($id); // Lanza una excepción si no encuentra el producto

            $product->update($request->all());

            if ($product->wasChanged()) {
                return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
            } 
            
            return response()->json(['message' => 'No changes were made to the product, invalid inputs'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        
        if($product){
            $product->delete();
            return response()->json(['message' => 'Product deleted', 'product' => $product]);
        }else{
            return response()->json(['message' => 'Product not found'], 404);
        };
    }

    public function getProductsByIds(Request $request)
{
        $ids = $request->input('ids'); // array de IDs
        $products = Product::whereIn('id', $ids)->get();
        return response()->json($products);
}

}
