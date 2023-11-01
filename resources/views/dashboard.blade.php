<x-app-layout>

    <div class="flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/2 py-12"> <!-- Column 1: Take up half width -->
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <div class="text-gray-500 leading-relaxed flex items-center justify-between">
                            <div>
                                <h4>Selamat Datang {{ Auth::user()->name }}</h4>
                                <h2>{{ ucfirst(Auth::user()->role->name) }}</h2>
                            </div>

                            @if (Auth::user()->role_id == 2)
                                <a href="{{ route('orders.show') }}">
                                    <x-button class="mb-4">
                                        Lihat Order
                                    </x-button>
                                </a>
                            @endif
                        </div>
                        @if (Auth::user()->role_id == 1)
                            <div class="flex justify-between">
                                <a href="{{ route('sales.show') }}"> {{-- {{ route('logout-and-register') }} --}}
                                    <x-button class="mt-4">
                                        Lihat Sales
                                    </x-button>
                                </a>

                                <a href="{{ route('orders.show') }}">
                                    <x-button class="mt-4">
                                        Lihat Order
                                    </x-button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 py-12"> <!-- Column 2: Take up half width -->
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-welcome />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
