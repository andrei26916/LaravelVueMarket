<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param ProductService $service
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(ProductService $service)
    {
        return $service->index();
    }

    /**
     * @param Request $request
     * @param ProductService $service
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show(Request $request, ProductService $service)
    {
        return $service->show($request->id);
    }

    /**
     * @param ProductService $service
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function productsByCategory(ProductService $service)
    {
        return $service->getProductsByCategory();
    }

    /**
     * @param ProductRequest $request
     * @param ProductService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request, ProductService $service)
    {
        return $service->create($request->all());
    }

    /**
     * @param ProductRequest $request
     * @param ProductService $service
     * @return mixed
     */
    public function update(ProductRequest $request, ProductService $service)
    {
        return $service->update($request->all());
    }

    /**
     * @param Request $request
     * @param ProductService $service
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search(Request $request, ProductService $service)
    {
        return $service->search($request->q);
    }

    /**
     * @param Request $request
     * @param ProductService $service
     * @return string
     */
    public function remove(Request $request, ProductService $service)
    {
        return $service->remove($request->id);
    }
}
