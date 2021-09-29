<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\{Store, User};
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;

class StoreController extends Controller
{
    private $stores;
    use UploadTrait;

    public function __construct(Store $stores)
    {
        $this->middleware('user.has.store')->only('create', 'store');
        $this->stores = $stores;
    }


    public function index(){
        $store = auth()->user()->store;
        return view('admin.stores.stores', compact('store'));
    }

    public function create()
    {
        $clientes = User::all();
        return view('admin.stores.create', compact('clientes'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug('name', '-');
        $user = auth()->user();
        if ($request->hasFile('logo')){
            $data['logo'] = $this->imageUpload($request);
        }
        $user->store()->create($data);

        flash('Loja Criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = $this->stores->find($store);
        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $store = $this->stores->find($store);
        $date = $request->all();

        if ($request->hasFile('logo')){
            $date['logo'] = $this->imageUpload($request, 'logo');
        }
        $store->update($date);

        flash('Loja Atualiza com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = $this->stores->find($store);
        $store->delete();

        flash('Loja Removida com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }


}
