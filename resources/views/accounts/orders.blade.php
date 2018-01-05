@extends('template.template')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/table-cart.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/login-cliente.css') }}">
@stop
@section('content')
        <div class="center">
            <div><h1 class="titulo-paginas">MEU HISTÓRICO</h1></div>
            <br>
            <br>
            <table class="cadastrado">
                <thead>
                <tr>
                    <th><h2><span>Meus Dados</span></h2>
                        <ul class="lista-usuario">
                            <li>Nome: <span class="dados-user">{!! Auth::user()->name !!} {!! Auth::user()->sobrenome !!}</span></li>
                            <li>CPF: <span class="dados-user">{!! Auth::user()->cpf !!}</span></li>
                            <li>E-mail: <span class="dados-user">{!! Auth::user()->email !!}</span></li>
                            <li>Sexo: <span class="dados-user">{!! Auth::user()->sexo !!}</span></li>
                            <li>Telefone: <span class="dados-user">{!! Auth::user()->telefone !!}</span></li>
                            <li>CEP: <span class="dados-user">{!! Auth::user()->cep !!}</span></li>
                            <li>Endereço de Entrega:<br> <span class="dados-user">{!! Auth::user()->rua !!} N° {!! Auth::user()->numero !!} {!! Auth::user()->complemento !!} {!! Auth::user()->bairro !!} {!! Auth::user()->uf !!} {!! Auth::user()->cidade !!}</span></li>
                            <a href="{{ route('account.edit', Auth::user()->id) }}"><button class="bnt-editar-user">Editar</button></a>
                        </ul>
                    </th>
                </tr>
                </thead>
            </table>
            <table class="novo-cliente dados-cliente">
                <thead>
                <tr>
                    <th><h2><span>Meus Pedidos</span></h2>
                        <table class="pedidos-orders">
                            <tbody>
                            <tr>
                                <th>ITEMS</th>
                                <th>CODIGO PEDIDO</th>
                                <th>VALOR TOTAL</th>
                                <th>ENTREGA</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        @foreach($order->items as $item)
                                            @if(!empty($item['produto_id']))
                                                <li class="list-ordens">{{ $item->produto->titulo }} - Cod. {{ $item->produto->codigo }}</li>
                                            @elseif(!empty($item['peca_id']))
                                                <li class="list-ordens">{{ $item->peca->titulo }} - Cod. {{ $item->peca->codigo }}</li>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $order->codigo }}</td>
                                    <td>{{ number_format($order->total + $order->frete,2,',','.')}}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{--<table class="pedidos-mobile">--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<th class="th-sborder">ITEMS</th>--}}
                            {{--</tr>--}}
                            {{--@foreach($orders as $order)--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--@foreach($order->items as $item)--}}
                                            {{--<a href="{{ route('produtos.detalhes', $item->peca->slug) }}"><li class="list-ordens">{{ $item->peca->titulo }}</li></a>--}}
                                        {{--@endforeach--}}
                                    {{--</td>--}}

                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                        <br>
                    </th>
                </tr>
                </thead>
            </table>
        </div>
@stop