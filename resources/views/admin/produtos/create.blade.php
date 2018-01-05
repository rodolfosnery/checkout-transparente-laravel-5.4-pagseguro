@extends('admin.template.admin')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Criar novo produto</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => 'admin.produtos.store', 'method'=>'post']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    <div class="panel-heading"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        Informações do produto</div>

                    <div class="panel-body">

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('status', 'Exibir no site:') !!}
                                {!! Form::select('status', array('1' => 'Ativo', '2' => 'Bloquear'), '1', ['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('destaque', 'Destaque:') !!}
                                {!! Form::select('destaque', array('1' => 'Ativo', '2' => 'Bloquear'), '2', ['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('outlet', 'Outlet:') !!}
                                {!! Form::select('outlet', array('1' => 'Sim', '2' => 'Não'), '2', ['class'=>'form-control']); !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('segmento_id', 'Segmento:') !!}
                                {!! Form::select('segmento_id', $segmentos, null, ['class'=>'form-control', 'placeholder'=>'Selecione']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('collection_id', 'Coleção:') !!}
                                {!! Form::select('collection_id', $collections, null, ['class'=>'form-control', 'placeholder'=>'Selecione']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('codigo', 'Codigo:') !!}
                                {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
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

                        </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('preco', 'Preço final:') !!}
                                    {!! Form::text('preco', null, ['class'=>'form-control preco']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('depor', 'Preço sem desconto:') !!}
                                    {!! Form::text('depor', null, ['class'=>'form-control depor']) !!}
                                </div>
                            </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                {!! Form::label('estampa', 'Estampas:') !!}
                                <select name="estampas[]" id="estampas" class="form-control" multiple>
                                    @foreach ($allEstampas as $estampa)
                                        <option @if (in_array($estampa, $estampas)) selected @endif
                                        value="{{ $estampa }}">
                                            {{ $estampa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição:') !!}
                                {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 bnt-fix">
            <div class="panel panel-default ">
                <div class="panel-body">
                    <div class="col-md-12 ">
                        {!! Form::submit('Salvar Produto', ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div><!-- /main -->
@stop




