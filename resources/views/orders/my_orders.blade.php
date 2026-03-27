<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Đơn hàng của tôi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($myOrders->isEmpty())
                    <p class="text-center text-gray-500">Bạn chưa mua món linh kiện nào cả. <a href="/" class="text-blue-600 underline">Mua ngay!</a></p>
                @else
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Mã Đơn</th>
                                <th class="py-2">Tổng Tiền</th>
                                <th class="py-2">Trạng Thái</th>
                                <th class="py-2">Ngày Mua</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($myOrders as $order)
                            <tr class="border-b">
                                <td class="py-3">#{{ $order->id }}</td>
                                <td class="py-3 font-bold text-red-600">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                <td class="py-3">
                                    <span class="px-2 py-1 rounded text-xs {{ $order->status == 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="py-3 text-sm">{{ $order->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>