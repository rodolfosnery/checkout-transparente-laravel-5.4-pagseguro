@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detalhes Pedido</h1>
        </div>
    </div><!--/.row-->

    {!! Form::open(['route'=>['admin.orders.update', $order->id], 'method'=>'put', 'role'=>'form'])  !!}
    @include('admin.partials.erros')
    @include('admin.partials.success')
    @include('admin.partials.successdel')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Informações</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data2.json" >
                        <thead>
                        <tr>
                            <th data-field="codigo" data-align="right">Código de pedido</th>
                            <th data-field="name">Nome completo</th>
                            <th data-field="email">Email</th>
                            <th data-field="itens">Itens</th>
                            <th data-field="frete">Valor frete</th>
                            <th data-field="total">Valor total</th>
                            <th data-field="status">Status</th>
                            <th data-field="rastreamento">Codigo Rastreamento</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>{{ $order->codigo }}</td>
                            <td>{{ $order->user->name }} {{ $order->user->sobrenome }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>

                                    @foreach($order->items as $item)
                                        @if(!empty($item['produto_id']))
                                            <li class="list-ordens">{{ $item->produto->titulo }} - Cod. {{ $item->produto->codigo }}</li>
                                        @elseif(!empty($item['peca_id']))
                                            <li class="list-ordens">{{ $item->peca->titulo }} - Cod. {{ $item->peca->codigo }}</li>
                                        @endif
                                    @endforeach
                            </td>
                            <td>R$ {{ number_format($order->frete,2,',','.') }}</td>
                            <td>R$ {{ number_format($order->total,2,',','.') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{!! Form::text('rastreamento', $order->rastreamento,['class'=>'form-control']) !!}</td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12 bnt-fix">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <div class="col-md-12 ">

                        <button type="submit" class="btn btn-success btn-sn"
                                name="action" value="finished">
                            Salvar Codigo Rastreamento
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div><!--/.main-->
@stop








