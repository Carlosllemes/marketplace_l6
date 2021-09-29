<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        $categories = $this->category->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $this->category->create($data);
        DB::commit();

        flash('Categoria Criado com Sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($category)
    {
        $category = $this->category->findOrFail($category);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $category)
    {
        DB::beginTransaction();
        $data = $request->all();

        $category = $this->category->find($category);
        $category->update($data);
        DB::commit();

        flash('Categoria Atualizada com Sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }


    public function destroy($category)
    {
        $category = $this->category->find($category);
        $category->delete();

        flash('Categoria Removida com Sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }
}
