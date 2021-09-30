<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = App\Product::all();
        foreach ($products as $product){$product->categories()->save((factory(\App\Category::class)->make()));}

    }
}
