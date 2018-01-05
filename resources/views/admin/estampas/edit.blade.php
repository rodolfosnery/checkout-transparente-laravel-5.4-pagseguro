@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar estampa cadastrada</h1>
            </div>
        </div><!--/.row-->

        {!! Form::open(['route'=>['admin.estampas.update', $estampa->id], 'method'=>'put', 'role'=>'form'])  !!}

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    <div class="panel-heading"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>
                        Informações principais</div>

                    <div class="panel-body">

                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('estampa', 'Estampa:') !!}
                                {!! Form::text('estampa',  $estampa->estampa, ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', $estampa->slug, ['class'=>'form-control']) !!}
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

                            <button type="button" class="btn btn-danger btn-sn"
                                    data-toggle="modal" data-target="#modal-delete">
                                Excluir
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg>
                        Fotos</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            @foreach ($estampa->images as $image)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{ url('img/estampas/thumb/'.$image->file_name) }}">
                                        <br>
                                        <div class="caption">
                                            <p><a href="{{ route('admin.imagesestampas.destroy', ['id' => $image->id]) }}" class="btn btn-xs btn-danger" role="button">Excluir</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <a href="{{ route('admin.estampas.images', $estampa->id) }}"
                               class="btn btn-warning">
                                <i class="glyphicon glyphicon-picture"></i> + Imagens
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
                        Tem certeza que quer colocar o estampa {{ $estampa->titulo }}, na lixeira?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.estampas.destroy', $estampa->id) }}">
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








