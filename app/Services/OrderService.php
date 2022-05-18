<?php


namespace App\Services;


use App\Order;

class OrderService
{

    /**
     * @param array $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(array $order)
    {
        dd($order);
        Order::create($order);
        return response('success');
    }

}
