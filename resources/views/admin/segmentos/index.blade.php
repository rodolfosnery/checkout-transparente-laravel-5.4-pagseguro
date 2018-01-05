@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastrar segmento</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.segmentos.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('titulo', 'Segmento:') !!}
                                {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Cadastrar Segmento', ['class'=>'btn btn-success']) !!}
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
                <h1 class="page-header">Segmentos Cadastrados</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">Segmento</th>
                                <th data-field="titulo" data-sortable="true">Segmento</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($segmentos as $segmento)
                            <tr>
                                <td>{{ $segmento->id }}</td>
                                <td>{{ $segmento->titulo }}</td>
                                <td>

                                    <a href="{{ route('admin.segmentos.edit', $segmento->id) }}"
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



