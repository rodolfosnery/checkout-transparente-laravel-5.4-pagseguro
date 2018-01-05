@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criar novo modelo</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.modelos.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    <div class="panel-heading"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>
                        Informações do projeto</div>

                    <div class="panel-body">


                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('segmento_id', 'Segmento:') !!}
                                    {!! Form::select('segmento_id', $segmentos, null, ['class'=>'form-control', 'placeholder'=>'Selecione']) !!}
                                </div>
                            </div>


                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('titulo', 'Titulo:') !!}
                                {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12 bnt-fix">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <div class="col-md-12 ">
                        {!! Form::submit('Salvar Novo Modelo', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div><!-- /main -->
@stop




