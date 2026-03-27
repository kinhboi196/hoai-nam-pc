<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::middleware(['auth', 'role:admin'])->group(function () {
    // Trang quản lý hóa đơn
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    
    // Bạn có thể giữ lại route cũ hoặc xóa đi
    Route::get('/admin/products', function () {
        return "Trang quản lý sản phẩm";
    })->name('admin.products');
});

Route::post('/admin/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update');

Route::get('/', [HomeController::class, 'index']);
// Chỉ những ai là Admin mới được vào nhóm này
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/products', function () {
        return "Trang này chỉ Admin mới thấy!";
    })->name('admin.products');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route để xử lý đặt hàng
Route::post('/buy/{productId}', [OrderController::class, 'store'])->name('order.store');

Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
