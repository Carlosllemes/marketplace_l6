<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\{Product, Category};
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

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
        DB::beginTransaction();
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $store = auth()->user()->store;
        $product = $store->product()->create($data);
        $product->categories()->sync($data['categories']);


        if($request->hasFile('images')){
            $images = $this->imageUpload($request, 'image');
            $product->images()->createMany($images);
        }
        DB::commit();




        flash('Produto Criado com Sucesso')->success();
        return  redirect()->route('admin.products.index');

    }


    public function show($product)
    {
        //
    }

    public function edit($product)
    {
        $products = $this->product->where('slug', $product)->first();
        $categories = Category::all(['id', 'name']);


        return view('admin.products.edit', compact('products', 'categories'));
    }


    public function update(ProductRequest $request, $product)
    {
        DB::beginTransaction();
        //busca os dados digitados nos inputs
        $data = $request->all();
        // busca o produto pelo parametro enviado via url
        $product = $this->product->find($product);
        // cria a relacao de produtos com a categoria passada no input categories
        $product->categories()->sync($data['categories']);
        //verifica se existe arquivos anexados dentro do input imags
        if($request->hasFile('images')){
            // chama a funcao de upload de imagens
            $images = $this->imageUpload($request, 'image');
            // cria a relacao entre imagem e produtos, createmany devido o returno da funcao ser um array
            $product->images()->createMany($images);
        }
        // faz o update do produto com as iformacoes passada pelo usuario
        $product->update($data);
        DB::commit();



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
