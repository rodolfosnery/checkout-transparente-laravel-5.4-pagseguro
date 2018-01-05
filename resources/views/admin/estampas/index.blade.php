@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastrar estampa</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.estampas.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('estampa', 'Estampa:') !!}
                                {!! Form::text('estampa', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
                            </div>
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
                <h1 class="page-header">Estampas Cadastrados</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg></div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true">Estampa</th>
                                <th data-field="titulo" data-sortable="true">Tiutlo</th>
                                <th data-field="images" data-sortable="true">Estampa</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estampas as $estampa)
                            <tr>
                                <td>{{ $estampa->id }}</td>
                                <td>{{ $estampa->estampa }}</td>
                                <td>
                                    @foreach($estampa->images as $image )
                                        <img src="{{ url('img/estampas/thumb/'.$image->file_name) }}">
                                    @endforeach
                                </td>

                                <td>

                                    <a href="{{ route('admin.estampas.edit', $estampa->id) }}"
                                       class="btn btn-sm btn-default">
                                        <i class="glyphicon glyphicon-list-alt"></i> Editar
                                    </a>


                                    <a href="{{ route('admin.estampas.images', $estampa->id) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="glyphicon glyphicon-picture"></i> Estampa
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



