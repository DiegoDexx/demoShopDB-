<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//import all controllers
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;



Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [UserController::class, 'login']);

// Rutas públicas
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/category/{category}', [ProductController::class, 'showByCategory']);


 // Rutas para búsqueda
Route::get('/search/category/{category}', [SearchController::class, 'searchByCategory']);
Route::get('/search/name/{name}', [SearchController::class, 'searchByName']);
Route::get('/search/brand/{brand}', [SearchController::class, 'searchByBrand']);
Route::get('/search/first-letter/{firstLetterName}', [SearchController::class, 'searchByFirstLetterName']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/users', [UserController::class,'store']);
    Route::get('/users', [UserController::class,'index']);
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::put('/users/{id}', [UserController::class,'update']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);  
    
    
    // Rutas privadas para productos (editar y borrar)

        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);

       // Rutas para obtener productos por IDs
       Route::post('/products/ids', [ProductController::class, 'getProductsByIds']);

       // Rutas para pedidos
       Route::resource('orders', OrderController::class);
   
       // Rutas para direcciones
       Route::resource('addresses', AddressController::class);
   
       // Rutas para carritos
       Route::resource('carts', CartController::class);
   
       // Rutas para elementos del carrito
       Route::resource('cart-items', CartItemController::class);
       //show by cart id
       Route::get('/cart-items/cart/{cart_id}', [CartItemController::class, 'showByCartId']);
   
       

});

