@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criar novo modelo</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-heading">
                        <a href="{{ route('admin.modelos.create') }}"
                           class="btn btn-success">
                            <i class="glyphicon glyphicon-plus"></i>Novo Modelo
                        </a>
                    </div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">id</th>
                                <th data-field="segmento" data-sortable="true">Segmento</th>
                                <th data-field="modelo" data-sortable="true">Titulo do Modelo</th>

                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modelos as $modelo)
                            <tr>
                                <td>{{ $modelo->id }}</td>
                                <td>{{ $modelo->segmento->titulo }}</td>
                                <td>{{ $modelo->titulo }}</td>


                                <td>

                                        <a href="{{ route('admin.modelos.edit', $modelo->id) }}"
                                           class="btn btn-sm btn-default">
                                            <i class="glyphicon glyphicon-list-alt"></i> Editar
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



