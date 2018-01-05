@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pedidos realizados</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="codigo" data-sortable="true">Codigo do Pedido</th>
                                <th data-field="user" data-sortable="true">Usuário</th>
                                <th data-field="frete" data-sortable="true">Valor frete</th>
                                <th data-field="valor" data-sortable="true">Valor total</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="entrega" data-sortable="true">Cod. Entrega</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->codigo }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>R$ {{ number_format($order->frete,2,',','.') }}</td>
                                <td>R$ {{ number_format($order->total,2,',','.') }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->rastreamento }}</td>
                                <td>
                                        <a href="{{ route('admin.orders.edit', $order->id) }}"
                                           class="btn btn-sm btn-default">
                                            <i class="glyphicon glyphicon-list-alt"></i> Detalhes
                                        </a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
</div><!--/.main-->
@stop



