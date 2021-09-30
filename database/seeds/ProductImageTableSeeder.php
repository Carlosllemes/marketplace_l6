<?php

use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Product::all();

        foreach ($products as $product){
            $product->images()
                    ->save(factory(\App\ProductImage::class)
                                ->make());

        }
    }
}
