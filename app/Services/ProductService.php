<?php


namespace App\Services;


use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Product::with('images', 'category')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show(int $id)
    {
        return Product::with('images', 'feedbacks.user')->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProductsByCategory()
    {
        return (Category::with('products.images')
            ->orderBy('priority')
            ->get())
            ->filter(function ($item){
                if ($item->products->count()) {
                    return $item;
                }
        });
    }

    /**
     * @param array $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(array $product): \Illuminate\Http\JsonResponse
    {
        $imageService = new ImageService();
        if (!$productDb = Product::create($product)){
            return response()->json('fail');
        }
        foreach ($product['images'] as $image){
            $path = $imageService->upload($image);
            $productDb->images()->create([
               'name' => $image->getClientOriginalName(),
               'src' => $path
            ]);
        }
        return response()->json('ok');
    }

    /**
     * @param array $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(array $product): \Illuminate\Http\JsonResponse
    {
        if (!Product::where('id', $product['id']->update($product))){
            return response()->json('fail');
        }
        return response()->json('ok');
    }
}
