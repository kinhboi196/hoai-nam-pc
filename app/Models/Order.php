<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'shipping_address',
    ];
    public function user()
    {
        // Một đơn hàng thuộc về (belongsTo) một người dùng
        return $this->belongsTo(User::class);
    }
}
