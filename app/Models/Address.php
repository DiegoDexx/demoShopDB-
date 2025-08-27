<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Address extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id', 'address_line_1', 'address_line_2', 'city', 'state', 'postal_code', 'country', 'is_default'
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
