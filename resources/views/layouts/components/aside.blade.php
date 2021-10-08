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

            <a href="{{route('checkout.index')}}" class="btn btn-out btn-success btn-square btn-main" data-abc="true"> Comprar </a>
            <a href="{{route('home')}}" class="btn btn-out btn-primary btn-square btn-main mt-2" data-abc="true">Continuar comprando</a>
            <a href="{{route('cart.cancel')}}" class="btn btn-out btn-outline-danger btn-square btn-main mt-2" data-abc="true">Cancelar Compra</a>

        </div>
    </div>
</aside>
