@extends('layouts.app')

@section('content')
    <a href="{{route('admin.stores.create')}}" class="mt-3 btn btn-success">Criar</a>
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
                <a href="{{route('admin.stores.edit', $store->id)}}" class="btn btn-primary">Editar</a>
                <a href="{{route('admin.stores.destroy', $store->id)}}" class="btn btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection
