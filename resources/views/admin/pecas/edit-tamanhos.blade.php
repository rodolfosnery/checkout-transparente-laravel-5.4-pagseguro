@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tamanhos e quantidades da peça {{ $tamanho->peca->titulo }}</h1>
            </div>
        </div><!--/.row-->
        {!! Form::open(['route' => ['admin.tamanhosprodutos.update', $tamanho->id], 'method'=>'put']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('tamanho_id', 'Tamanho:') !!}
                                    {!! Form::select('tamanho_id', $tamanhos, $tamanho->tamanho->id, ['class'=>'form-control', 'disabled']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('quantidade', 'Quantidade:') !!}
                                    {!! Form::text('quantidade', $tamanho->quantidade, ['class'=>'form-control']) !!}
                                </div>
                                <br>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::submit('Alterar', ['class'=>'btn btn-success']) !!}
                                </div>
                            </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="col-md-12 ">
                                    <a href="{{ route('admin.pecas.edit', $tamanho->peca->id) }}" class="btn btn-default btn-md">Voltar para a peça</a>
                                    <a href="{{ route('admin.pecas.index') }}" class="btn btn-default btn-md">Voltar para lista de peças</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div><!-- /main -->

@stop



