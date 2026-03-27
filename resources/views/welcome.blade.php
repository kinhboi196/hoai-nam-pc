<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoài Nam PC - Cửa hàng linh kiện</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow mb-8 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-blue-800">Hoài Nam PC</a>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Bảng điều khiển</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium mr-4">Đăng nhập</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Đăng ký</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 text-center font-bold">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-4xl font-bold text-center text-blue-800 mb-8">HOÀI NAM PC</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach ($products as $product)
                <div
                    class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-600 hover:shadow-xl transition-shadow">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 mb-2">Mã SP: {{ $product->sku }}</p>
                    <p class="text-gray-600 mb-4 h-12">{{ $product->description }}</p>

                    <p class="text-red-600 font-extrabold text-2xl mb-4">
                        {{ number_format($product->price, 0, ',', '.') }} VNĐ
                    </p>

                    <form action="{{ route('order.store', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition-colors">
                            Mua ngay (Còn {{ $product->stock_quantity }} SP)
                        </button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>
</body>

</html>
