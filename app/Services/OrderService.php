<?php


namespace App\Services;


use App\Basket;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    /**
     * @param array $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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

        $order['user_id'] = Auth::id();

        $order['data'] = json_encode($baskets);

        if (Order::create($order)){
            Basket::where('user_id', Auth::id())->delete();
        }

        return response('ok');
    }

}
