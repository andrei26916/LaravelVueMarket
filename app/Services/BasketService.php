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
       return Basket::with('product.images')->where('user_id', Auth::id())->get();
    }

    /**
     * @param $array
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($array): \Illuminate\Http\JsonResponse
    {
        $array['user_id'] = Auth::id();

        if (Basket::create($array)){
            return response()->json('ok');
        }

        return response()->json('error');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(int $id): \Illuminate\Http\JsonResponse
    {
        Basket::where([['product_id', $id], ['user_id', Auth::id()]])->delete();

        return response()->json('ok');
    }

    /**
     * @param int $id
     * @param int $count
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, int $count): \Illuminate\Http\JsonResponse
    {
        Basket::where([['product_id', $id], ['user_id', Auth::id()]])->update([
            'count' => $count,
        ]);

        return response()->json('ok');
    }

}
