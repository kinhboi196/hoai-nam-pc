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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Thuộc hóa đơn nào?
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Mua sản phẩm nào?  
            $table->integer('quantity'); // Số lượng bao nhiêu cái?
            $table->decimal('unit_price', 15, 2); // Giá bán tại thời điểm mua          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
