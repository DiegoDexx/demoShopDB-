<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//HasApiTokens;
 use Laravel\Sanctum\HasApiTokens;
 use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory, Notifiable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', // Teléfono
        'default_ship_address',  // Dirección predeterminada
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // Obtener la dirección predeterminada
    public function defaultAddress()
    {
        return $this->hasOne(Address::class)->where('is_default', true);
    }

    // Relación con el carrito
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // Relación con los pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
