<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class=" text-gray-500 leading-relaxed">

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-error mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="gramature" value="Gramature"></x-label>
                <x-input class="block w-full mt-1" type="text" name="gramature"
                    placeholder="Masukan Gramature"></x-input>
            </div>
            <div class="mt-4">
                <x-label for="coresta" value="Coresta"></x-label>
                <x-input class="block w-full mt-1" type="text" name="coresta"
                    placeholder="Masukan Coresta"></x-input>
            </div>
            <div class="mt-4">
                <x-label for="ukuran" value="Ukuran"></x-label>
                <x-input class="block w-full mt-1" type="text" name="ukuran"
                    placeholder="Masukan Ukuran (kg)"></x-input>
            </div>
            <div class="flex mt-4 gap-2">
                <div class="w-1/2">
                    <x-label for="date" value="Month"></x-label>
                    <x-input class="block w-full mt-1" type="month" name="month_order"
                        placeholder="Pilih Minggu"></x-input>
                </div>
                <div class="w-1/2">
                    <x-label for="date" value="Week"></x-label>
                    <x-select class="block w-full mt-1 p-1.5" name="week_order">
                        <option value="1">Minggu ke-1 (1 - 7)</option>
                        <option value="2">Minggu ke-2 (8 - 14)</option>
                        <option value="3">Minggu ke-3 (15 - 21)</option>
                        <option value="4">Minggu ke-4 (22 - Akhir Bulan)</option>
                    </x-select>
                </div>
            </div>
            <x-button class="mt-7">
                Order Boy
            </x-button>
        </form>
    </div>
</div>
