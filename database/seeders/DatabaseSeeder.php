<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi các Seeder con theo thứ tự logic
        $this->call([
            RoleSeeder::class,    // Tạo Role và User Admin trước
            ProductSeeder::class, // Tạo Sản phẩm sau
        ]);
    }
}