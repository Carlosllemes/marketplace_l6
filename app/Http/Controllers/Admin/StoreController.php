<?php

namespace App\Http\Controllers\Admin;
use App\{Store, User};
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $stores;

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
        $user = auth()->user();
        $user->store()->create($data);

        flash('Loja Criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = $this->stores->find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest  $request , $store)
    {
        $date = $request->all();

        $store = $this->stores->find($store);
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
