<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy toàn bộ sản phẩm trong kho
        $products = Product::all(); 
        
        // Đẩy danh sách sản phẩm sang trang giao diện tên là 'welcome'
        return view('welcome', compact('products')); 
    }
}