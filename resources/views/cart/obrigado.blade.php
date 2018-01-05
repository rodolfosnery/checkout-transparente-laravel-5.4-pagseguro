@extends('template.template')
@section('meta')
    <title>Brasil70 Bikini</title>
    <meta name="description" content="">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/table-cart.css') }}">
@stop
@section('content')

        <div class="center">
            <table class="obrigado-table">
                <tbody>
                        @if($cart == 'empty')
                            <tr class="vazio">
                                <td colspan="5"><h1>Seu carrinho de compras está vazio!</h1><h2>Para inserir produtos em seu carrinho navegue pelo site e clique no botão de comprar.</h2>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td class="obrigado" colspan="6"><div class="agra">Obrigado, aguardando pagamento!</div><br><h1>seu pedido está registrado, N°{{ $order->codigo }}<br>assim que confirmado seu pagamento você recebera um email com mais detalhes de sua comprar.</h1>
                            </td>
                        </tr>
                        @endif
                </tbody>
            </table>
        </div>

@stop