@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
    <h2 class="txt-center mb-4">Sacola de compras</h2>
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
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
                        @php
                        $total = 0;
                        @endphp
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
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="align-bottom">
                        <span class="font-weight-bold">Preco Total:</span>
                        <p class="text-right ml-3">R$: {{number_format($total + ($total * 10 / 100), 2, ',', '.')}}</p>
                    </div>
                    <hr class="mt-0 mb-1">
                    <div class="align-bottom">
                        <span class="font-weight-bold" >Desconto:</span>
                        <p class="text-right text-danger ml-3">R$ -{{number_format($total + ($total * 10 / 100) - $total , 2, ',', '.')}}</p>
                    </div>
                    <hr class="mt-0 mb-1">
                    <div class="align-bottom">
                        <span class="font-weight-bold">Total:</span>
                        <p class="text-right text-dark b ml-3">R$: <strong>{{number_format($total, 2, ',', '.')}}</strong></p>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-out btn-success btn-square btn-main" data-abc="true"> Comprar </a>
                    <a href="#" class="btn btn-out btn-primary btn-square btn-main mt-2" data-abc="true">Continuar comprando</a>
                </div>
            </div>
        </aside>
    </div>

@endsection
@section('footer-scripts')
    <script src="{{ asset('js/scripts/deleteimg.js') }}" defer></script>

@endsection
