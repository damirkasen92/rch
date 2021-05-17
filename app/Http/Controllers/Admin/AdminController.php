<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        //dd('access granted');

        $orders = Order::with('user')->orderBy('created_at', 'DESC')->paginate(5);

        foreach ($orders as $order) {
            $order->items = json_decode($order->items);
        }

        //dd($orders->toArray());

        return view('admin.index', [
            'title' => 'Список заказов',
            'orders' => $orders
        ]);
    }
}
