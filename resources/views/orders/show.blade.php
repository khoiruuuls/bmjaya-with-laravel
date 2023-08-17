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
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Order ID</th>
                                <th class="px-4 py-2">Gramature</th>
                                <th class="px-4 py-2">Coresta</th>
                                <th class="px-4 py-2">Ukuran</th>
                                <th class="px-4 py-2">Jadwal</th>
                                <th class="px-4 py-2">Nama Pemesan</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 0;
                                $hasData = false;
                            @endphp

                            @foreach ($orders as $order)
                                @if (Auth::user()->role_id == 1 || $order->user_id == Auth::user()->id)
                                    @php
                                        $num++;
                                        $hasData = true;
                                    @endphp
                                    <tr class="text-center">
                                        <td class="border px-4 py-2">{{ $num }}</td>
                                        <td class="border px-4 py-2">{{ $order->gramature }}</td>
                                        <td class="border px-4 py-2">{{ $order->coresta }}</td>
                                        <td class="border px-4 py-2">{{ $order->ukuran }}</td>
                                        <td class="border px-4 py-2">{{ date('d F Y', strtotime($order->date_order)) }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $order->user->name }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('orders.edit', $order->id) }}" class="text-2xl">
                                                <i class="ri-edit-box-line"></i>
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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

                            @if (!$hasData)
                                <tr>
                                    <td colspan="8" class="pt-7">Tidak ada data.</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
