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
                <form action="{{ route('sales.update', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="name" value="Name"></x-label>
                        <x-input class="block mt-1 w-full" type="text" name="name"
                            value="{{ $order->name }}"></x-input>
                    </div>

                    <div class="mt-4">
                        <x-label for="employee_id" value="Employee ID"></x-label>
                        <x-input class="block mt-1 w-full" type="text" name="employee_id"
                            value="{{ $order->employee_id }}"></x-input>
                    </div>

                    <x-button class="mt-7">
                        Edit Sales
                    </x-button>
                </form>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
