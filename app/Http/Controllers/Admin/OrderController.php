<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Lấy danh sách hóa đơn, kèm thông tin người mua, sắp xếp mới nhất lên đầu
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);

        // Đổi trạng thái thành hoàn thành
        $order->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Đã xác nhận đơn hàng #' . $id . ' thành công!');
    }
}