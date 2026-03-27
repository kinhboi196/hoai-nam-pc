<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Chào mừng **{{ Auth::user()->name }}**!
                    Bạn đang đăng nhập với quyền:
                    <span class="text-blue-600 font-bold">
                        {{ Auth::user()->getRoleNames()->first() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
