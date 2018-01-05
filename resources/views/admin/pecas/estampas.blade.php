@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estampas do produto {{ $produto->titulo }}</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.tamanhosprodutos.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">

                            {!! Form::hidden('produto_id', $produto->id) !!}

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('titulo', 'Estampa:') !!}
                                    {!! Form::select('titulo', $estampas, null, ['class'=>'form-control', 'placeholder'=>'Selecione']) !!}
                                </div>
                            </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Cadastrar Estampa', ['class'=>'btn btn-success']) !!}
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
                <h1 class="page-header">Tamanhos e quantidade cadastrados</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
                    </div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">Id</th>
                                <th data-field="tamanho" data-sortable="true">Tamanho</th>
                                <th data-field="quantidade" data-sortable="true">Quantidade</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($produto_tamanhos as $tamanho)
                            <tr>
                                <td>{{ $tamanho->id }}</td>
                                <td>{{ $tamanho->tamanho->tamanho }}</td>
                                <td>{{ $tamanho->quantidade }}</td>
                                <td>

                                    <a href="{{ route('admin.tamanhosprodutos.destroy', $tamanho->id) }}"
                                       class="btn btn-sm btn-danger">
                                        <i class="glyphicon glyphicon-remove-circle"></i> Excluir
                                    </a>
                                    <a href="{{ route('admin.tamanhosprodutos.edit', $tamanho->id) }}"
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <div class="col-md-12 ">
                        <a href="{{ route('admin.produtos.index') }}" class="btn btn-default btn-md">Voltar para lista de produtos</a>
                        <a href="{{ route('admin.produtos.edit', $produto->id) }}" class="btn btn-default btn-md">Voltar para o produto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.main-->
@stop



