@extends('layouts.app')

@section('content')
    <a href="{{route('admin.stores.create')}}" class="mt-3 btn btn-success">Criar Loja</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Acoes</th>

        </tr>
        </thead>
        <tbody>
        @foreach( $stores as $store)
        <tr>
            <th scope="row">{{$store->id}}</th>
            <td>{{$store->name}}</td>
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
        @endforeach

        </tbody>
    </table>
    {{$stores->links()}}
@endsection
