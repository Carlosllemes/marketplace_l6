<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $store = $user->store()->first();
        $products = $store->product()->get();


        return view('home' , compact('user', 'store', 'products'));
    }

    public function single($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('admin.products.single', compact('product'));
    }
}
