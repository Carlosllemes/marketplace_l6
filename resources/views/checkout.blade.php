@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">

            <form class="needs-validation" novalidate="">
                <h4 class="mb-3">Pagamento</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credito" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credito">Cartão de crédito</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debito" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debito">Cartão de débito</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-nome">Nome no cartão</label>
                        <input type="text" class="form-control" id="cc-nome" placeholder="" required="">
                        <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                        <div class="invalid-feedback">
                            O nome que está no cartão é obrigatório.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-numero">Número do cartão de crédito <span class="brand"></span></label>
                        <input type="text" class="form-control" name="cc-numero" placeholder="" required="">
                        <div class="invalid-feedback">
                            O número do cartão de crédito é obrigatório.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiracao">Data de expiração</label>
                        <input type="text" class="form-control" id="cc-expiracao" placeholder="" required="">
                        <div class="invalid-feedback">
                            Data de expiração é obrigatória.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback">
                            Código de segurança é obrigatório.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue o checkout</button>
            </form>
        </div>
            @include('layouts.components.aside')
    </div>
@endsection
@section('footer-scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        const sessionId = '{{session()->get('pagseguro_session_code')}}';

        PagSeguroDirectPayment.setSessionId(sessionId)
    </script>

    <script>
        let cardNumber = document.querySelector('input[name=cc-numero]');
        let spanBrand = document.querySelector('span.brand');
        cardNumber.addEventListener('keyup', function (){
            if (cardNumber.value.length >= 6){
                PagSeguroDirectPayment.getBrand({

                    cardBin: cardNumber.value.substr(0, 6),
                    success: function (res){
                        let cardFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`
                        spanBrand.innerHTML = cardFlag;
                    },
                    error: function (err){
                      //console.log('Erro '+err)
                    },
                    complete: function (res){
                        //console.log('AAAAA ' + res)
                    },


                })
            }
            });
    </script>
@endsection
