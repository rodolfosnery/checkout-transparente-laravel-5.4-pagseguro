@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastrar tamanho</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.tamanhos.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('tamanho', 'Tamanho:') !!}
                                {!! Form::text('tamanho', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Cadastrar Tamanhos', ['class'=>'btn btn-success']) !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div><!-- /main -->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tamanhos Cadastrados</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg></div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">Tamanho</th>
                                <th data-field="titulo" data-sortable="true">Tamanhos</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tamanhos as $tamanho)
                            <tr>
                                <td>{{ $tamanho->id }}</td>
                                <td>{{ $tamanho->tamanho }}</td>
                                <td>

                                    <a href="{{ route('admin.tamanhos.edit', $tamanho->id) }}"
                                       class="btn btn-sm btn-default">
                                        <i class="glyphicon glyphicon-list-alt"></i> Editar
                                    </a>

                                    <a href="{{ route('admin.tamanhos.destroy', $tamanho->id) }}"
                                       class="btn btn-sm btn-danger">
                                        <i class="glyphicon glyphicon-remove-circle"></i> Excluir
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



