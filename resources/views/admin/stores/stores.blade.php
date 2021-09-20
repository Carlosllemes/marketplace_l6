@extends('layouts.app')

@section('content')
    @if(!$store)
    <a href="{{route('admin.stores.create')}}" class="mt-3 btn btn-success">Criar Loja</a>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Produtos</th>
            <th scope="col">Acoes</th>
        </tr>
        </thead>
        <tbody>

        @if($store)
        <tr>
            <th scope="row">{{$store->id}}</th>
            <td>{{$store->name}}</td>
            <td>{{$store->product->count()}}</td>

            <td>
                <div class="btn-group">
                <a href="{{route('admin.stores.edit', $store->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{route('admin.stores.destroy', $store->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
                </div>
            </td>
        </tr>
        @endif


        </tbody>
    </table>

@endsection
