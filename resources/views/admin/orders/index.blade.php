<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quản lý Hóa đơn') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="py-3 px-4">Mã Đơn</th>
                            <th class="py-3 px-4">Khách hàng</th>
                            <th class="py-3 px-4">Tổng tiền</th>
                            <th class="py-3 px-4">Trạng thái</th>
                            <th class="py-3 px-4">Ngày đặt</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-4">#{{ $order->id }}</td>
                                <td class="py-3 px-4">{{ $order->user->name }}</td>
                                <td class="py-3 px-4 text-red-600 font-bold">
                                    {{ number_format($order->total_price, 0, ',', '.') }}đ
                                </td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 rounded text-xs {{ $order->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800' }}">
                                        {{ strtoupper($order->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-500">
                                    {{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-3 px-4">
                                    @if ($order->status == 'pending')
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-bold transition">
                                                Xác nhận đơn
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Đã xử lý</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
