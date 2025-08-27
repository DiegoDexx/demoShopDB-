<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Relación con Order
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Relación con Product
            $table->integer('quantity');  // Cantidad del producto en el pedido
            $table->decimal('price', 10, 2);  // Precio del producto en el momento de la compra
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
