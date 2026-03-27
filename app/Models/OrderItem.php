<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
    ];
    public function product()
    {
        // Một dòng chi tiết đơn hàng thuộc về một sản phẩm
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        // Một dòng chi tiết đơn hàng thuộc về một hóa đơn
        return $this->belongsTo(Order::class);
    }
}
