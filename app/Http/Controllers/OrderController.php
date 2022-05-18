<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store(OrderCreateRequest $request, OrderService $service)
    {
        return $service->store($request->all());
    }
}
