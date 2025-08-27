<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id','total_amount', 'status', 'address_id'];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con los productos (a través de cart_items o una tabla intermedia si lo prefieres)
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'price')  // Incluir la cantidad y precio en la relación
                    ->withTimestamps();  // Guardar los timestamps de la relación
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
