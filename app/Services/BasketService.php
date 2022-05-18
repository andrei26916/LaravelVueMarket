<?php


namespace App\Services;


use App\Basket;
use Illuminate\Support\Facades\Auth;

class BasketService
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Basket::with('product')->where('user_id', Auth::id())->get();
    }

}
