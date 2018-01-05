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
        <div><h1 class="titulo-paginas">CARRINHO DE COMPRAS</h1></div>
        <table class="table-cart">
            <thead>
            <tr>
                <th>Produto</th>
                <th class="titulo-th">Titulo</th>
                <th>Tamanho</th>
                <th>Valor unidade</th>
                <th class="qtd-th">Quantidade</th>
                <th>Valor subtotal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @forelse($cart->all() as $k=>$item)
                <tr>
                    <td class="img-cart">
                        <a href="{{ route('produtos.detalhes', $item['slug']) }}">
                            @if(!empty($item['cartpro']))
                                <img src="{{ url('img/produtos/thumb/'.$item['file_name']) }}">
                            @else
                                <img src="{{ url('img/pecas/thumb/'.$item['file_name']) }}">
                            @endif
                        </a>
                    </td>
                    <td class="titulo-th"><a href="{{ route('produtos.detalhes', $item['slug']) }}">{{ $item['titulo'] }}</a></td>
                    <td>{{ $item['tamanho'] }}</td>
                    <td>R$ {{ number_format($item['preco'],2,',','.') }}</td>
                    <td class="qtd-th">{{ $item['qtd'] }}</td>
                    <td>R$ {{ number_format($item['preco'] * $item['qtd'],2,',','.') }}</td>
                    <td class="excluir-cart">
                        <a href="{{ route('cart.destroy', ['id'=>$k]) }}">
                            <img src="{{ url('img/excluir.svg') }}"></a>
                    </td>
                </tr>
            @empty
                <tr class="vazio">
                    <td colspan="7"><h1>Sua sacola de compras está vazia!</h1><h2>Para inserir produtos na sacola navegue pelo site e clique no botão adicionar na sacola.</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <table class="subtotal">
            <thead>
            <tr>
                <th>Subtotal R$ {{ number_format($cart->getTotal(),2,',','.') }}</th>
            </tr>

            </thead>
        </table>
        <table class="desconto">
            <thead>
            <tr>
                <th>Cupom de desconto
                    <div class="form-group">
                        {!! Form::text('cupom desconto', null, ['class' => 'smaller']) !!}
                        {!! Form::submit('Calcular', ['class'=>'btn-calcular']) !!}
                    </div>
                    <p>Insira somente numeros.</p>
                </th>
            </tr>
            </thead>
        </table>

        <table class="frete">
            <thead>
            <tr>
                <th>Calcule o frete
                    <div class="form-group">
                        {!! Form::open(['route' => 'cart', 'method'=>'post']) !!}
                        {!! Form::text('cep_destino', null, ['class' => 'smaller', 'placeholder' => 'Cep']) !!}
                        {!! Form::submit('Calcular', ['class'=>'btn-calcular']) !!}
                        {!! Form::close() !!}
                    </div>
            <span class="dadosfrete">
                @foreach($xml->cServico as $dados)
                    @if($dados->Erro == 0)
                        <ul>
                        <li>Valor R$ {{ $dados->Valor }}</li>
                        <li>Pazo de entrega, {{ $dados->PrazoEntrega }} dia úteis.</li>
                        </ul>
                    @else
                        <p>Insira somente numeros.</p>
                    @endif
                @endforeach
            </span>
                </th>
            </tr>
            </thead>
        </table>

        <table class="total-pedido">
            <thead>
            <tr>
            <?php
            $valorfrete = str_replace(",",".", $dados->Valor);
            $valortotalprod = $cart->getTotal();
            ?>
            <th>Total do pedido R$ {{ number_format($valorfrete+$valortotalprod,2,',','.') }}

            <br>
            </th>
            </tr>
            </thead>
        </table>


        @if(!empty($cart->all()))
            <div class="bnt-continuar"><a href="javascript:window.history.go(-1)">CONTINUAR COMPRANDO</a></div>
        @else
            <div class="bnt-continuar"><a href="{{ url('segmento/feminino') }}">CONTINUAR COMPRANDO</a></div>
        @endif

        @if(!empty($cart->all()))
        <div class="bnt-fechar-pedido"><a href="{{ route('resumo') }}">FECHAR PEDIDO</a></div>
        @endif

        <div class="contrato">
            <p class="p-cart">A inclusão de um produto no "carrinho" não garante sua reserva. O produto somente estará reservado ao cliente após a finalização do pedido e aprovação pela operado de cartão. </p>
        </div>
    </div>
@stop