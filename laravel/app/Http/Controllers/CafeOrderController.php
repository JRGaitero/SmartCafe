<?php

namespace App\Http\Controllers;

use App\Models\Order;

class CafeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cafeOrders = [];

        $orders = Order::with(['product' => function($query) use ($id) {
            $query->where('cafe_id', $id);
        }])->get();

        foreach ($orders as $order) {
            if (count($order->product) > 0) {
                $cafeOrders[] = $order;
            }
        }

        return $cafeOrders;
    }
}
