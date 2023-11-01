<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function show()
    {
        $sales = User::where('role_id', 2)->get();
        return view('sales.show', compact('sales'));
    }
    public function destroy(User $order)
    {
        $order->delete();
        return redirect()->route('sales.show')->with('success', 'sales has been deleted');
    }

    public function edit(User $order)
    {
        return view('sales.edit', compact('order'));
    }

    public function update(Request $request, User $order)
    {
        $order->update([
            'name' => $request->input('name'),
            'employee_id' => $request->input('employee_id'),
        ]);

        return redirect()->route('sales.show')->with('success', 'sales updated successfully');
    }
}