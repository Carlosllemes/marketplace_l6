@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Produtos</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach( $products as $p)
            <div class="col-3">
                <div class="card">
            @if($p->images->count())
            <img src="{{asset('storage/products').'/'.$p->images->first()->image}}" alt="...">
            @else
                <img src="{{asset('storage/assets/no-photo.jpg')}}" class="card-img-top " alt="...">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$p->name}}</h5>
                <p class="card-text">{{$p->description}}</p>
                <a href="{{route('product.single', ['slug' => $p->slug])}}" class="btn btn-primary">Saiba Mais</a>
            </div>
        </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
