<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
{
    // Đây chính là đoạn code bạn hỏi: Lấy đơn hàng của riêng người đang đăng nhập
    $myOrders = Order::where('user_id', Auth::id())->latest()->get();

    // Trả về giao diện danh sách đơn hàng của khách
    return view('orders.my_orders', compact('myOrders'));
}
    public function store(Request $request, $productId)
    {
        // 1. Kiểm tra xem khách đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để mua hàng!');
        }

        $product = Product::findOrFail($productId);
        $user = Auth::user();

        // 2. Dùng Transaction để đảm bảo nếu lỗi thì không lưu gì cả (Rất quan trọng trong ngành Bank/E-commerce)
        DB::transaction(function () use ($product, $user) {
            // Tạo hóa đơn tổng
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $product->price,
                'status' => 'pending',
                'shipping_address' => 'Địa chỉ mặc định của Nam PC', // Sau này có thể làm form nhập
            ]);

            // Tạo chi tiết hóa đơn
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_price' => $product->price,
            ]);

            // Trừ số lượng tồn kho (Stock)
            $product->decrement('stock_quantity', 1);
        });

        return redirect()->back()->with('success', 'Đã đặt hàng thành công linh kiện: ' . $product->name);
    }
}