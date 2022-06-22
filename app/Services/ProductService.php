<?php


namespace App\Services;


use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;

class ProductService
{

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Product::with('images', 'category')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show(int $id)
    {
        return Product::with(['images' => function($query){
            $query->select('*', 'src as url');
        }, 'feedbacks.user'])->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProductsByCategory()
    {
        return (Category::with('products.images')
            ->orderBy('priority', 'DESC')
            ->get())
            ->filter(function ($item){
                if ($item->products->count()) {
                    return $item;
                }
        });
    }

    /**
     * @param $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($product): \Illuminate\Http\JsonResponse
    {
        if (!$result = Product::create($product)){
            return response()->json('fail');
        }
        $result->images()->attach($product['images']);
        return response()->json('success');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(array $data)
    {
        $product = Product::find($data['id']);
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];

        $product->images()->sync(collect($data['images'])->pluck('image_id'));

        $product->save();

        return response('ok');
    }


    public function search(string $query)
    {
        return Product::with('images')->where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
    }

    /**
     * @param int $id
     * @return string
     */
    public function remove(int $id): string
    {
        Product::where('id', $id)->delete();
        return 'success';
    }
}
