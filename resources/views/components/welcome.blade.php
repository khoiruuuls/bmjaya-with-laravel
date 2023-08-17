<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class=" text-gray-500 leading-relaxed">

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
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
                <x-input class="block w-full mt-1" type="text" name="ukuran" placeholder="Masukan Ukuran"></x-input>
            </div>
            <div class="mt-4">
                <x-label for="date_order" value="Date Order"></x-label>
                <x-input class="block w-full mt-1" type="date" name="date_order"
                    placeholder="Masukan Date Order"></x-input>
            </div>
            <x-button class="mt-7">
                Order
            </x-button>
        </form>
    </div>
</div>
