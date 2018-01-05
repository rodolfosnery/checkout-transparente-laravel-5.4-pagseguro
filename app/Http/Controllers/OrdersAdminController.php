<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrdersAdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()
            ->route('admin.orders.index')
            ->withSuccess('Alterado com sucesso!');
    }


}
