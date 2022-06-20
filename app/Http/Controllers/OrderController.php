<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        return Order::orderBy('created_at', 'desc')->get();
    }


    /**
     * @return mixed
     */
    public function indexByUser()
    {
        return Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function cancelByUser(Request $request)
    {
        Order::where([['id', $request->id], ['user_id', Auth::id()]])->update([
           'status' => 5,
        ]);

        return response('ok');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function repeatByUser(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 0;

        return Order::create($order->toArray());
    }


    public function store(OrderCreateRequest $request, OrderService $service)
    {
        return $service->store($request->all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $order = Order::find($request->id);

        if ($order->status < 3){
            $order->status += 1;
            $order->save();
        }

        return response('ok');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function cancel(Request $request)
    {
        Order::where('id', $request->id)->update([
            'status' => 5
        ]);

        return response('ok');
    }
}
