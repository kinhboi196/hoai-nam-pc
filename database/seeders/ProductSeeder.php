<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Thêm dòng này để gọi Database

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Laptop MSI GF63 Thin 11UC',
                'sku' => 'MSI-GF63-i7',
                'price' => 16500000,
                'stock_quantity' => 10,
                'specifications' => json_encode(['CPU' => 'i7-11800H', 'GPU' => 'RTX 3050 4GB']),
                'description' => 'Cỗ máy chiến game quốc dân, hiệu năng cực đỉnh trong tầm giá.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop DELL LATITUDE E5520',
                'sku' => 'DELL-E5520',
                'price' => 3500000,
                'stock_quantity' => 5,
                'specifications' => json_encode(['CPU' => 'i5-2520M', 'RAM' => '16GB DDR3']),
                'description' => 'Hàng siêu bền bỉ, đáp ứng tốt các tác vụ cơ bản.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Màn hình Gaming 144Hz (Hỗ trợ OC)',
                'sku' => 'MON-144HZ',
                'price' => 4200000,
                'stock_quantity' => 15,
                'specifications' => json_encode(['Refresh Rate' => '144Hz', 'Overclock' => 'Lên tới 160Hz']),
                'description' => 'Màn hình tần số quét cao, ép xung mượt mà không lo sọc viền.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}