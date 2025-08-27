<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Product search controller
     */

     public function searchByCategory(string $category)
     {
         $products = Product::where('category', $category)->get();

         if($products){
         return response()->json(['products' => $products]);
         }else{
             return response()->json(['message' => 'Category not found'], 404);
         }
     }

     public function searchByName(string $name){
        {
        $products = Product::where('name', $name)->get();

        if($products){
            return response()->json(['products' => $products]);
        }else{
            return response()->json(['message'=> ''],404);
     }
    }
}

    public function searchByBrand(string $brand)
    {
        $products = Product::where('brand', $brand)->get();

      if ($products->isEmpty()) {
                return response()->json(['message'=> 'Product not found'], 404);
            } else {
                return response()->json(['products'=> $products]);
            }
        }
    

    /**
     * Buscar por letra que contenga el nombre
     */

    public function searchByFirstLetterName(string $firstLetterName){
        $products = Product::where('name', 'like', $firstLetterName . '%')->get();
        if ($products->isEmpty()) {
                return response()->json(['message'=> 'Product not found'], 404);
            } else {
                return response()->json(['products'=> $products]);
            }
        }
}
