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
<h2 class="text-uppercase font-weight-bold">{{$product->name}}</h2>

<div class="row">
    <div class="col-6">

<div class="slick-slider custom">

    <div class="single-item">
        @foreach($product->images as $image)
            <img class="slider-img slider-nav" src="{{asset('storage/products').'/'. $image->image }}"/>
        @endforeach
    </div>

</div>

    </div>
    <div class="col-6">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Produto</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Informacoes Tecnicas</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{{$product->body}}</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">{{$product->description}}</div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
    <script src="{{asset('js/scripts/single-item.js')}}"></script>
@endsection
