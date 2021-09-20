<?php

namespace App\Http\Controllers\Admin;

use App\Store;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product){

        $this->product = $product;
    }


    public function index()
    {
        $products = $this->product->paginate(10);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $stores = Store::all();
        $products = $this->product->all();

        return view('admin.products.create', compact('products', 'stores'));

    }


    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $store = auth()->user()->store;
        $store->product()->create($data);

        flash('Produto Criado com Sucesso')->success();
        return  redirect()->route('admin.products.index');

    }


    public function show($product)
    {
        //
    }

    public function edit($product)
    {
        $products = $this->product->find($product);

        return view('admin.products.edit', compact('products'));
    }


    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->product->find($product);
        $product->update($data);

        flash('Produto atualizado com sucesso')->success();
        return redirect()->route('admin.products.index');
    }


    public function destroy($product)
    {
        $product = $this->product->find($product);
        $product->delete();

        flash('Produto excluido com Sucesso');
        return redirect()->route('admin.products.index');
    }
}
