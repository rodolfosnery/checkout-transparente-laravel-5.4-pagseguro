@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lixeira produtos</h1>
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
                                <th data-field="segmento" data-sortable="true">Segmento</th>
                                <th data-field="preco" data-sortable="true">Valor</th>
                                <th data-field="foto" data-sortable="true">Imagem</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->titulo }}</td>
                                <td>{{ $produto->segmento->titulo }}</td>
                                <td>{{ $produto->preco }}</td>

                                @if($produto->images->count()>0)
                                    <td class="foto-ajust">
                                        <img class="foto-admin" src="{{ url('img/produtos/thumb/'.$produto->images->first()->file_name) }}">
                                    </td>
                                @else
                                    <td class="foto-ajust">
                                    </td>
                                @endif

                                <td>
                                        <a href="{{ route('admin.produtos.deletar', $produto->id) }}"
                                           class="btn btn-sm btn-danger">
                                            <i class="fa fa-edit"></i>Excluir
                                        </a>
                                        <a href="{{ route('admin.produtos.ativar', $produto->id) }}"
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



