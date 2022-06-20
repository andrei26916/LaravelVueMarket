<?php


namespace App\Services;


use App\Basket;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public function store(array $order)
    {
        $baskets = (new BasketService())->index();

        if (!count($baskets)){
            return response('false');
        }

        $baskets = $baskets->map(function($item){
            $item->product->count = $item->count;
            $item->price = $item->price * $item->count;
            return $item->product;
        });

        $order['price'] = $baskets->sum('price');

        $order['user_id'] = Auth::id();

        $order['data'] = $baskets;

        if (Order::create($order)){
            Basket::where('user_id', Auth::id())->delete();
        }

        return response('ok');
    }

}
