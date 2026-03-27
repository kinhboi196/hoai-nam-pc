<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Gọi thư viện Spatie
use App\Models\User; // Gọi bảng User
use Illuminate\Support\Facades\Hash; // Để mã hóa mật khẩu

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tạo các nhóm quyền (Roles)
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);

        // 2. Tạo tài khoản Chủ shop (Admin)
        $adminUser = User::create([
            'name' => 'Nam Admin',
            'email' => 'admin@hoainampc.com', 
            'password' => Hash::make('12345678'), // Mật khẩu mặc định là 12345678
        ]);

        // Gắn mác "admin" cho tài khoản này
        $adminUser->assignRole($adminRole);

        // 3. Tạo thử một tài khoản Khách hàng để test
        $customerUser = User::create([
            'name' => 'Khách Hàng',
            'email' => 'khachhang@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Gắn mác "customer" cho tài khoản này
        $customerUser->assignRole($customerRole);
    }
}