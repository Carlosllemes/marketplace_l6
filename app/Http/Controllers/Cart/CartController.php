<?php

namespace App\Http\Controllers\Cart;

use App\Console\Commands\view;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = session()->get('cart');
        return view('cart.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->get('product');
        if (session()->has('cart')){
            session()->push('cart', $product);
        }else{
            $products[] = $product;
            session()->put('cart', $products);
        }
        flash('Produto adicionado');
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (!session()->has('cart')) {return redirect()->route('cart.cart.index');}

        $products = session('cart');
        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });


        session()->put('cart',$products);
        return redirect()->route('cart.cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');
        flash('Compra Cancelada')->success();
        return redirect()->route('cart.cart.index');
    }

}
