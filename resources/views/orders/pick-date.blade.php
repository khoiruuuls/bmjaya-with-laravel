<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class=" text-gray-500 leading-relaxed">
                        <div class="mt-4">
                            <x-label for="date_order" value="Date"></x-label>
                            <x-input class="block w-full mt-1" type="text" name="date_order"
                                placeholder="Masukan Tanggal Order"></x-input>
                        </div>
                        <x-button class="mt-7">
                            Order
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
