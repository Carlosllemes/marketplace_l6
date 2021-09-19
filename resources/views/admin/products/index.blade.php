@extends('layouts.app')

@section('content')
    <a href="{{route('admin.products.create')}}" class="mt-3 btn btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preco</th>
            <th scope="col">Acoes</th>

        </tr>
        </thead>
        <tbody>
        @foreach( $products as $p)
        <tr>
            <th scope="row">{{$p->id}}</th>
            <td>{{$p->name}}</td>
            <td>R$ {{number_format($p->price, 2, ',' , '.')}}</td>
            <td>
               <div class="btn btn-group">
                   <a href="{{route('admin.products.edit', $p->id)}}" class="btn btn-primary">Editar</a>
                   <form method="POST" action="{{route('admin.products.destroy', $p->id)}}">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger">Remover</button>
                   </form>
               </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {{$products->links()}}

@endsection
