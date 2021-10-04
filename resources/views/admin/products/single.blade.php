@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('admin.products.index')}}">Produtos</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</nav>
<hr>
<div class="row">
    <div class="col-md-8 slider-product">

<div class="slick-slider custom">

    <div class="single-item">
        @if($product->images->count())
            @foreach($product->images as $image)
                <img class="slider-img slider-nav" src="{{asset('storage/products').'/'. $image->image }}"/>
            @endforeach
        @endif
            <img src="{{asset('storage/assets/no-photo.jpg')}}" class="card-img-top " alt="...">
    </div>

</div>

    </div>
    <div class="col-md-4 aside-product">
        <h2 class="text-uppercase font-weight-bold">
            {{$product->name}}
        </h2>
        <p class="aside-product-desc">
            {{$product->description}}
        </p>
        <p class="aside-product-price-before">
            de: {{number_format(($product->price) + ($product->price * 10) / 100, 2,",", ".")}}
        </p>
        <span class="d-block">Por</span>
        <p class="aside-product-price">
            R$: {{number_format($product->price, 2, ",", ".")}}
        </p>
        <p class="aside-product-category">
            Categoria
            @foreach($product->categories as $category)
                <span class="badge bg-info">{{$category->name}}</span>
            @endforeach
        </p>
        <form method="POST" action="{{route('cart.cart.store')}}">
            @csrf
            <input value="{{$product->name}}" name="product[name]" type="text" hidden>
            <input value="{{$product->slug}}" name="product[slug]" type="text" hidden>
            <input value="{{$product->price}}" name="product[product]" type="text" hidden>
            <input value="{{$product->categories()->first()->name}}" name="product[category]" type="text" hidden>
            <input value="{{$product->images()->first()->image}}" name="product[image]" type="text" hidden>
            <div class="form-group">
                <label for="amount" class="form-label">Quantidade</label>
                <input class="form-control w-25" name="product[amount]" type="number" value="1">
                <button class="btn btn-success mt-3">Comprar</button>
            </div>
        </form>
    </div>
    <div class="container">
    <div class="col-md-12 mt-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Produto</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Informacoes Tecnicas</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="container"><p>{{$product->body}}</p></div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">{{$product->description}}</div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('footer-scripts')
    <script src="{{asset('js/scripts/single-item.js')}}"></script>
@endsection
