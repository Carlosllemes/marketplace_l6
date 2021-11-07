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
                    <div class="col-md-12">
                        <div class="form-group stallments">

                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Comprar</button>
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
        let cardNumber = document.querySelector('input[name=cc-numero]');
        let spanBrand = document.querySelector('span.brand');

        //card number
        cardNumber.addEventListener('keyup', function (){
            if (cardNumber.value.length == 6){
                PagSeguroDirectPayment.getBrand({
                    cardBin: cardNumber.value.substr(0, 6),
                    success: function (res){

                        let cardFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`
                        spanBrand.innerHTML = cardFlag;
                        getInstallments({{session()->get('total')}}, res.brand.name);

                    },
                    error: function (err){
                        spanBrand.innerHTML = 'cartao invalido';
                    },
                })
            }
        })
        //end get card number


        // get installments
        function getInstallments(amount, brand){
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,
                maxInstallmentNoInterest:0,
                success: function (res){
                    let selectInstallments = drawSelectInstallments(res.installments['visa'])
                    document.querySelector('div.stallments').innerHTML = selectInstallments;
                },
                error: function (err){
                    console.log(err);
                },
            })
        }
        //end get installments


        //draw select installments
        function drawSelectInstallments(installments) {
            let select = '<label class="form-label">Opções de Parcelamento:</label>';

            select += '<select class="form-control">';

            for(let l of installments) {
                select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
            }


            select += '</select>';

            return select;
	    }
        //end draw select installments





    </script>
@endsection
