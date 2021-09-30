@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produtos</li>
        </ol>
    </nav>
    <a href="{{route('admin.products.create')}}" class="mt-3 btn btn-success">Criar Produto</a>
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preco</th>
            <th scope="col">Loja</th>
            <th scope="col">Imagens</th>
            <th scope="col">Acoes</th>


        </tr>
        </thead>
        <tbody>
        @foreach( $products as $p)

            <tr>
            <th scope="row">{{$p->id}}</th>
            <td>{{$p->name}}</td>
            <td>R$ {{number_format($p->price, 2, ',' , '.')}}</td>
            <td>{{$p->store->name}}</td>
            <td>{{$p->images->count()}}</td>
            <td>
               <div class="btn btn-group">
                   <a href="{{route('admin.products.edit', $p->slug)}}" class="btn btn-primary ml-1"><i class="fa fa-edit"></i></a>
                   <a href="{{route('product.single', ['slug' => $p->slug])}}" class="btn btn-primary ml-1"><i class="fa fa-eye"></i></a>
                   <a data-id="{{$p->id}}" class="btn btn-danger ml-1"><i style="color: #fff;" class="fa fa-trash"></i></a>
               </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {{$products->links()}}

@endsection
@section('footer-scripts')
    <script src="{{ asset('js/scripts/deleteimg.js') }}" defer></script>

@endsection
