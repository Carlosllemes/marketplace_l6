<?php

namespace App\Http\Controllers\Admin;

use App\{Product, Category};
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

    private $product;

    public function __construct(Product $product){

        $this->product = $product;
    }


    public function index()
    {
        $userStore = auth()->user()->store;
        $products = $userStore->product()->paginate(10);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {

        $categories = Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));

    }


    public function store(ProductRequest $request)
    {

        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->product()->create($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('images')){
            $images = $this->imageUpload($request, 'image');
            $product->images()->createMany($images);
        }



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
        $categories = Category::all(['id', 'name']);


        return view('admin.products.edit', compact('products', 'categories'));
    }


    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->product->find($product);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('images')){
            $images = $this->imageUpload($request, 'image');
            $product->images()->createMany($images);
        }

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
