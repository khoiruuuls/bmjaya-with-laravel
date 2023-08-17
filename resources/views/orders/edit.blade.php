<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Selamat datang {{ Auth::user()->name }} sebagai {{ Auth::user()->role->name }} role
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 overflow-hidden shadow-xl sm:rounded-lg ">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <p class="mt-6 text-gray-500 leading-relaxed">
                    @if (Auth::user()->role_id == 1)
                        <!-- Role Admin -->
                        Welcome, admin! You have access to administrative features.
                        tulis bisa ngapain aja disini
                    @else
                        {{-- {{ route('orders.update', ['order' => $order->id]) }}" --}}
                        <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-label for="gramature" value="Gramature"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="gramature"
                                    value="{{ $order->gramature }}"></x-input>
                            </div>

                            <div class="mt-4">
                                <x-label for="coresta" value="Coresta"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="coresta"
                                    value="{{ $order->coresta }}"></x-input>
                            </div>
                            <div class="mt-4">
                                <x-label for="ukuran" value="Ukuran"></x-label>
                                <x-input class="block mt-1 w-full" type="text" name="ukuran"
                                    value="{{ $order->ukuran }}"></x-input>
                            </div>
                            <div class="mt-4">
                                <x-label for="date_order" value="Date Order"></x-label>
                                <x-input class="block w-full mt-1" type="date" name="date_order"
                                    value="{{ $order->date_order }}"></x-input>
                            </div>

                            <x-button class="mt-7">
                                Edit Order
                            </x-button>
                        </form>
                    @endif
                </p>

            </div>

        </div>
    </div>
</x-app-layout>
