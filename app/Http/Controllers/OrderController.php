<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\WeeklyAllocation;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Data pesanan dari form
        $orderData = [
            'gramature' => $request->input('gramature'),
            'coresta' => $request->input('coresta'),
            'ukuran' => $request->input('ukuran'),
            'user_id' => Auth::user()->id,
            'date_order' => Carbon::now(),
            'month_order' => $request->input('month_order'),
            'week_order' => $request->input('week_order'),
        ];

        // Batasan alokasi perminggu
        $maxAllocationPerWeek = 800000;

        // Jumlah pesanan yang akan ditempatkan
        $totalOrder = $orderData['ukuran'];

        while ($totalOrder > 0) {
            // Mendapatkan tanggal awal dan akhir minggu berdasarkan minggu yang dipilih
            $selectedWeek = $orderData['week_order'];
            $selectedMonth = Carbon::parse($orderData['month_order']);
            $startDateOfMonth = $selectedMonth->startOfMonth();
            $startDateOfWeek = $startDateOfMonth->copy()->addWeeks($selectedWeek - 1)->startOfWeek();
            $endDateOfWeek = $startDateOfMonth->copy()->addWeeks($selectedWeek - 1)->endOfWeek();

            // Hitung sisa alokasi yang tersedia di minggu ini
            $totalOrderThisWeek = Order::whereBetween('date_order', [$startDateOfWeek, $endDateOfWeek])->sum('ukuran');

            // Hitung sisa alokasi yang tersedia di minggu ini
            $remainingAllocationThisWeek = $maxAllocationPerWeek - $totalOrderThisWeek;

            // Hitung jumlah pesanan yang akan ditempatkan pada minggu ini
            $orderThisWeek = min($remainingAllocationThisWeek, $totalOrder);

            // Jika ada pesanan yang akan ditempatkan pada minggu ini
            if ($orderThisWeek > 0) {
                // Tambahkan pesanan ke database
                Order::create([
                    'gramature' => $orderData['gramature'],
                    'coresta' => $orderData['coresta'],
                    'ukuran' => $orderThisWeek,
                    'user_id' => $orderData['user_id'],
                    'date_order' => $orderData['date_order'],
                    'month_order' => $orderData['month_order'],
                    'week_order' => $orderData['week_order'],
                ]);

                // Kurangi pesanan dari total
                $totalOrder -= $orderThisWeek;

                // Update alokasi kilogram
                $this->updateAllocation($startDateOfWeek, $orderThisWeek);
            }

            // Pindahkan ke minggu berikutnya
            $orderData['week_order']++;
        }

        session()->flash('success', 'Pesanan berhasil ditempatkan.');

        return view('dashboard');
    }

    private function updateAllocation($startDateOfWeek, $allocatedKilograms)
    {
        $allocation = WeeklyAllocation::where('start_date', $startDateOfWeek)->first();

        if (!$allocation) {
            $allocation = new WeeklyAllocation();
            $allocation->start_date = $startDateOfWeek;
            $allocation->allocated_kilograms = $allocatedKilograms;
        } else {
            $allocation->allocated_kilograms += $allocatedKilograms;
        }

        $allocation->save();
    }


    public function show()
    {
        $orders = Order::all(); // Fetch all orders
        return view('orders.show', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.show')->with('success', 'Order Deleted Successfully.');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'gramature' => $request->input('gramature'),
            'coresta' => $request->input('coresta'),
            'ukuran' => $request->input('ukuran'),
            'date_order' => $request->input('date_order'),
        ]);

        return redirect()->route('orders.show')->with('success', 'Order updated successfully');
    }

    public function pick_date()
    {
        return view('orders.pick-date');
    }
}