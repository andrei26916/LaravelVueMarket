<?php


namespace App\Services;


use App\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteService
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Favorite::with('product')->where('user_id', Auth::id())->get();
    }
}
