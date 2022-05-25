<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return to_route('admin.orders.index')->with('danger', 'Запись удалена успешно!');
    }

    public function show()
    {
        return Excel::download(new OrderExport, 'Заказы.xlsx');
    }
}
