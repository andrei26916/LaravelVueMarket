<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 5)->create();
        $images = \App\Image::all()->pluck('id');
        $products = \App\Product::all();
        foreach ($products as $product){
            $product->images()->attach($images);
        }
    }
}
