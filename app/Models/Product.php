<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'category', 'brand', 'color', 'image', 'price', 'stock'
    ];



    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot('quantity', 'price')  // Incluir la cantidad y precio en la relación
                    ->withTimestamps();  // Guardar los timestamps de la relación
    }

}
