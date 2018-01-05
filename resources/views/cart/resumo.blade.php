@extends('template.template')
@section('meta')
    <title>Brasil70 Bikini</title>
    <meta name="description" content="">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/table-cart.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/login-cliente.css') }}">
@stop
@section('content')
    <section class="resumo">
        <div class="center">
            <div><h1 class="titulo-paginas">FINALIZANDO A COMPRA</h1></div>
            <br>
            <br>
            <table class="cadastrado">
                <thead>
                <tr>
                    <th><h2><span>Endereço de Entrega</span></h2>
                        <ul class="lista-usuario">
                            <li>Endereço: <p class="dados-user">{!! Auth::user()->rua !!} N° {!! Auth::user()->numero !!} {!! Auth::user()->complemento !!} {!! Auth::user()->bairro !!} {!! Auth::user()->uf !!} {!! Auth::user()->cidade !!}</p></li>
                            <li>CEP: <p class="dados-user">{!! Auth::user()->cep !!}</p></li>
                            <a href="{{ route('account.edit', Auth::user()->id) }}"><button class="bnt-editar-user">Editar</button></a>
                        </ul>
                    </th>
                </tr>
                </thead>
            </table>
            <table class="novo-cliente dados-cliente">
                <thead>
                <tr>
                    <th><h2><span>Revisão do Pedido</span></h2>
                        <table class="pedidos">
                            <tbody>
                            <tr>
                                <th>PRODUTO</th>
                                <th></th>
                                <th>QTD</th>
                                <th>TAMANHO</th>
                                <th>VALOR</th>
                            </tr>
                            @foreach($cart->all() as $k=>$item)
                                <tr>
                                    <td class="img-cart">
                                        <a href="{{ route('produtos.detalhes', $item['slug']) }}">
                                            @if(!empty($item['cartpro']))
                                                <img src="{{ url('img/produtos/thumb/'.$item['file_name']) }}">
                                            @else
                                                <img src="{{ url('img/pecas/thumb/'.$item['file_name']) }}">
                                            @endif
                                    </td>

                                    <td class="titulo-th"><a href="{{ route('produtos.detalhes', $item['slug']) }}">{{ $item['titulo'] }}</a></td>
                                    <td>{{ $item['qtd'] }} </td>
                                    <td>{{ $item['tamanho'] }}</td>
                                    <td> {{ number_format($item['preco'] * $item['qtd'],2,',','.') }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <table class="pedidos">
                                @foreach($xml->cServico as $dados)
                                <th>Valor do Frete R$ {{ $dados->Valor }}</th>
                                <th>Pazo de entrega, {{ $dados->PrazoEntrega }} dia úteis.</th>
                                @endforeach
                        </table>
                        <table class="pedidos">
                            <?php
                            $valorfrete = str_replace(",",".", $dados->Valor);
                            $valortotalprod = $cart->getTotal();
                            ?>
                            <th>Valor total do pedido R$ {{ number_format($valorfrete+$valortotalprod,2,',','.') }}</th>
                        </table>
                        <br>
                    </th>
                </tr>
                </thead>

            </table>
            @if(!empty($cart->all()))
                <table class="cadastrado form-pagamento">
                    <thead>
                    <tr>
                        <th><h2><span>Pagamento</span></h2>

                            <div class="coluna-100">
                                <label>Cartões de Credito</label>
                                {{--<img src="{{ url('img/bandeiras-cartoes-e-boleto2.jpg') }}">--}}
                                <div id="payment_methods"></div>
                            </div>

                            {!! Form::open(['route'=>['checkout'], 'method'=>'post', 'id'=>'form'])  !!}

                            {{ Form::hidden('shippingType', 1) }}

                            {{ Form::hidden('creditCardToken', '', array('id' => 'creditCardToken')) }}

                            {{ Form::hidden('installmentValue', '', array('id' => 'installmentValue')) }}

                            {{ Form::hidden('senderHash', '', array('id' => 'senderHash')) }}

                            {{ Form::hidden('shippingCost', $valorfrete, array('id' => 'shippingCost')) }}

                            {{ Form::hidden('reference', $reference, array('id' => 'reference')) }}


                            {{--<div class="coluna-100">--}}
                                {{--{!! Form::label('name', 'Nome do Titular:') !!}--}}
                                {{--{!! Form::text('name', null,['class' => 'w85', 'required', 'id'=>'name']) !!}--}}
                            {{--</div>--}}

                            <div class="coluna-100">
                                {!! Form::label('senderName', 'Nome do Titular:') !!}
                                {!! Form::text('senderName', null,['class' => 'w85', 'id'=>'senderName']) !!}
                            </div>

                            <div class="coluna-60">
                                {!! Form::label('cardNumber', 'N° Cartão:') !!}
                                {!! Form::text('cardNumber', null,['class' => 'w80', 'required', 'id'=>'cardNumber']) !!}
                                <div id="card_brand"></div>
                            </div>


                            <div class="coluna-40">
                                {!! Form::label('cvv', 'Cód. Segurança:') !!}
                                {!! Form::text('cvv', null,['class' => 'w30', 'required', 'id' => 'cvv']) !!}
                            </div>

                            <div class="coluna-50">
                                {!! Form::label('vencimento', 'Vencimento') !!}
                                {!! Form::select('expirationMonth', [
                                'MM' => 'MM',
                                '01' => '01',
                                '02' => '02',
                                '03' => '03',
                                '04' => '04',
                                '05' => '05',
                                '06' => '06',
                                '07' => '07',
                                '08' => '08',
                                '09' => '09',
                                '10' => '10',
                                '11' => '11',
                                '12' => '12',], null, array('class' => 'appearance-select', 'id' => 'expirationMonth')) !!}
                                {!! Form::select('expirationYear', [
                                'AAAA' => 'AAAA',
                                '2018' => '2018',
                                '2019' => '2019',
                                '2020' => '2020',
                                '2021' => '2021',
                                '2022' => '2022',
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                                '2027' => '2027',
                                '2028' => '2028',
                                '2029' => '2029',
                                '2030' => '2030'
                                ], null, array('class' => 'appearance-select', 'id' => 'expirationYear')) !!}
                            </div>
                            <div class="coluna-50">
                                {!! Form::label('installmentQuantity', 'Parcelas') !!}
                                <select name="installmentQuantity" id="installmentQuantity" class="browser-default appearance-select-parcelas w85">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            {!! Form::submit('FINALIZAR COMPRA', ['class'=>'btn-finalizar-compra']) !!}
                            {!! Form::close() !!}
                        </th>
                    </tr>
                    </thead>
                </table>
            @endif
        </div>
    </section>
@stop
@section('js')
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    {{--HasPagSeguro--}}
    <script src="{{ URL::asset('js/pagseguro.js') }}"></script>

    <script>

        const paymentData = {
            brand: '',
            amount:{{ $amount }},
        }

        PagSeguroDirectPayment.setSessionId('{!! $session !!}');

        pagSeguro.getPaymentMethods(paymentData.amount)
                .then(function(urls){
                    let html = '';

                    urls.forEach(function(url){
                        html += '<img src="' + url + '" class="credit_card">'
                    });

                    $('#payment_methods').html(html);
                });

        $('#senderName').on('change', function(){
           pagSeguro.getSenderHash().then(function(data){
               $('#senderHash').val(data);
           })
        });

        $('#cardNumber').on('keyup', function() {
            if ($(this).val().length >= 6) {
                let bin = $(this).val();
                pagSeguro.getBrand(bin)
                        .then(function (res) {
                            paymentData.brand = res.result.brand.name;
                            $('#card_brand').html('<img src="' + res.url + '" class="credit_card">')
                            return pagSeguro.getInstallments(paymentData.amount, paymentData.brand);
                        })
                        .then(function(res) {
                            let html = '';
                            res.forEach(function (item) {
                                html += '<option value="' + item.quantity + '">' + item.quantity + 'x R$' + item.installmentAmount + ' - Total R$' + item.totalAmount + '</option>'
                            });
                            $('#installmentQuantity').html(html);
                            $('#installmentValue').val(res[0].installmentAmount);
                            $('#installmentQuantity').on('change', function () {
                                let value = res[$('#installmentQuantity').val() - 1].installmentAmount;
                                $('#installmentValue').val(value);
                            });
                        })
            }
        });

        $('#form').on('submit', function(e){
            e.preventDefault();
            let params = {
                cardNumber: $('#cardNumber').val(),
                cvv: $('#cvv').val(),
                expirationMonth: $('#expirationMonth').val(),
                expirationYear: $('#expirationYear').val(),
                brand: paymentData.brand
            }
            pagSeguro.createCardToken(params).then(function(token){
                $('#creditCardToken').val(token);

                let url = $('#form').attr('action');
                let data = $('#form').serialize();
                $.post(url, data).then(function(){
                    window.location = '/obrigado/{{$valorfrete}}/{{$reference}}';
                });

            });

        });
    </script>
@stop





