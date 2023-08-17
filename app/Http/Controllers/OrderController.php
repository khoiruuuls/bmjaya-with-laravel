<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $orderData = [
            'gramature' => $request->input('gramature'),
            'coresta' => $request->input('coresta'),
            'ukuran' => $request->input('ukuran'),
            'user_id' => Auth::user()->id,
            'date_order' => $request->input('date_order')
        ];

        Order::create($orderData);

        session()->flash('success', 'Order successfully placed.');

        return view('dashboard');
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