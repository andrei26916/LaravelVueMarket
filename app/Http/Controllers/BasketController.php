<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketCreateRequest;
use App\Services\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @param BasketService $service
     * @return mixed
     */
    public function index(BasketService $service)
    {
        return $service->index();
    }

    /**
     * @param Request $request
     * @param BasketService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BasketCreateRequest $request, BasketService $service): \Illuminate\Http\JsonResponse
    {
        return $service->store($request->all());
    }

    /**
     * @param Request $request
     * @param BasketService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request, BasketService $service): \Illuminate\Http\JsonResponse
    {
        return $service->remove($request->id);
    }

    /**
     * @param Request $request
     * @param BasketService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, BasketService $service): \Illuminate\Http\JsonResponse
    {
        return $service->update($request->id, $request->count);
    }
}
