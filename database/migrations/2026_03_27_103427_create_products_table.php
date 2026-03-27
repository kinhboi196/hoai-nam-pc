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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên linh kiện
            $table->string('sku')->unique(); // Mã sản phẩm
            $table->decimal('price', 15, 2); // Giá sản phẩm
            $table->integer('stock_quantity'); // Số lượng tồn kho
            $table->json('specifications')->nullable(); // Thông số kỹ thuật (dạng JSON)
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
