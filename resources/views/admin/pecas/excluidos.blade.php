@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lixeira Peças</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-heading">
                        
                        <a href="{{ route('admin.produtos.create') }}"
                           class="btn btn-success">
                            <i class="glyphicon glyphicon-plus"></i>Novo Produto
                        </a>

                        <a href="{{ route('admin.produtos.excluidos') }}"
                           class="btn btn-danger">Lixeira</a>

                        <a href="{{ route('admin.produtos.destaque') }}"
                           class="btn btn-info">Destaques Home</a>

                        <a href="{{ route('admin.produtos.sale') }}"
                           class="btn btn-warning">Sale</a>

                        <a href="#"
                           class="btn btn-default">Esgotados</a>

                    </div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">id</th>
                                <th data-field="produto" data-sortable="true">Titulo</th>
                                <th data-field="modelo" data-sortable="true">Modelo</th>
                                <th data-field="preco" data-sortable="true">Valor</th>
                                <th data-field="foto" data-sortable="true">Imagem</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pecas as $peca)
                            <tr>
                                <td>{{ $peca->id }}</td>
                                <td>{{ $peca->titulo }}</td>
                                <td>{{ $peca->modelo->titulo }}</td>
                                <td>{{ $peca->preco }}</td>

                                @if($peca->images->count()>0)
                                    <td class="foto-ajust">
                                        <img class="foto-admin" src="{{ url('img/pecas/thumb/'.$peca->images->first()->file_name) }}">
                                    </td>
                                @else
                                    <td class="foto-ajust">
                                    </td>
                                @endif

                                <td>
                                        <a href="{{ route('admin.pecas.deletar', $peca->id) }}"
                                           class="btn btn-sm btn-danger">
                                            <i class="fa fa-edit"></i>Excluir
                                        </a>
                                        <a href="{{ route('admin.pecas.ativar', $peca->id) }}"
                                           class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>Ativar
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



