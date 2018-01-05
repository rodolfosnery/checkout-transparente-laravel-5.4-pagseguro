@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar tamanho cadastrado</h1>
            </div>
        </div><!--/.row-->

        {!! Form::open(['route'=>['admin.tamanhos.update', $tamanho->id], 'method'=>'put', 'role'=>'form'])  !!}

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    <div class="panel-heading"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
                        Informações principais</div>

                    <div class="panel-body">

                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('tamanho', 'Tamanho:') !!}
                                {!! Form::text('tamanho',  $tamanho->tamanho, ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', $tamanho->slug, ['class'=>'form-control']) !!}
                            </div>


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

                            <button type="submit" class="btn btn-success btn-sn"
                                    name="action" value="finished">
                                Salvar e finalizar
                            </button>

                            <button type="submit" class="btn btn-primary btn-sn"
                                    name="action" value="continue">
                                Salvar e continuar
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div><!-- /main -->

    {{--Confirm Delete--}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Preciso de sua confirmação</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Tem certeza que quer colocar o tamanho {{ $tamanho->titulo }}, na lixeira?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.tamanhos.destroy', $tamanho->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i>Sim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--FIM--}}
@stop








