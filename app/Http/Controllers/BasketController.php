<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @param Request $request
     * @param BasketService $service
     * @return mixed
     */
    public function index(Request $request, BasketService $service)
    {
        return $service->index();
    }
}
