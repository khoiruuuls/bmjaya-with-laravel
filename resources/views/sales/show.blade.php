<x-app-layout>
    <div class="py-12">
        <div class="max-w mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="p-6 lg:p-8 bg-white">
                    @if (session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <x-button class="mb-5">
                        <a href="{{ route('logout-and-register') }}">
                            Daftarkan sales
                        </a>
                    </x-button>

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Nomer</th>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 0;
                                $hasData = false;
                            @endphp

                            @foreach ($sales as $order)
                                @if (Auth::user()->role_id == 1 || $order->user_id == Auth::user()->id)
                                    @php
                                        $num++;
                                        $hasData = true;
                                    @endphp
                                    <tr class="text-center">
                                        <td class="border px-4 py-2" data-order="{{ $num }}">{{ $num }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $order->name }}</td>
                                        <td class="border px-4 py-2">{{ $order->employee_id }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('sales.edit', $order->id) }}" class="text-2xl">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('sales.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-2xl text-red-500 hover:text-red-700">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
