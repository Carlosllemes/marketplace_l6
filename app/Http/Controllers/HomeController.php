<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product->limit(20)->orderBy('id', 'DESC')->get();
        return view('home' , compact('products'));
    }

    public function single($slug)
    {
        $product = $this->product->where('slug', $slug)->first();

        return view('admin.products.single', compact('product'));
    }
}
