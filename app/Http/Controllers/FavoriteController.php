<?php

namespace App\Http\Controllers;

use App\Services\FavoriteService;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @param Request $request
     * @param FavoriteService $service
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request, FavoriteService $service)
    {
        return $service->index();
    }
}
