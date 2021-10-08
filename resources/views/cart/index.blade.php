@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
    <h2 class="txt-center mb-4">Sacola de compras</h2>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    @php
                        $total = 0;
                    @endphp
                    @if($products)
                        <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Produto</th>
                                <th scope="col" width="200">Quantidade</th>
                                <th scope="col" width="200">Preco</th>
                                <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img src="{{asset('storage/products').'/'. $product['image']}}" class="img-sm"></div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark" data-abc="true">{{$product['name']}}</a>
                                            <p class="text-muted small">Categoria: {{$product['category']}}</p>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <input type="number" disabled name="amount" class="form-control" value="{{$product['amount']}}">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <p class="price m-1"><small class="text-muted ">Uni: </small>R$ {{$product['product']}}</p>
                                        @php
                                            $subtotal = $product['product'] * $product['amount'];
                                            $total += $subtotal;
                                            session()->put('total', $total);
                                        @endphp
                                        <small class="text-muted">Subtotal: R$ {{{number_format($subtotal, 2, ',','.')}}} </small>
                                    </div>
                                </td>
                                <td class="text-right d-none d-md-block">
                                    <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-red" data-toggle="tooltip" data-abc="true">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <form method="post" class="btn-group" action="{{route('cart.cart.destroy', $product['slug'])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-red" data-abc="{{$product['slug']}}"> Remover</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
       @include('layouts.components.aside')
    </div>

@endsection
@section('footer-scripts')
    <script src="{{ asset('js/scripts/deleteimg.js') }}" defer></script>

@endsection
