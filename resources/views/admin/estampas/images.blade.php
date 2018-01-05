@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estampa {{ $estampa->titulo }}</h1>
                <div class="alert alert-warning" role="alert">
                    Formato para estampas 200x200px
                </div>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @include('admin.partials.erros')
                    @include('admin.partials.success')
                    @include('admin.partials.successdel')
                    <div class="panel-body">
                        <div class="col-md-12">
                            {!! Form::open(['route'=>['admin.imagesestampas.store', $estampa->id], 'method'=>'post',
                                'class'=>'form-horizontal dropzone', 'enctype'=>"multipart/form-data"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default ">
                    <div class="panel-body">
                        <div class="col-md-12 ">
                            <a href="{{ route('admin.estampas.index') }}" class="btn btn-default btn-md">Voltar para lista de estampas</a>
                            <a href="{{ route('admin.estampas.edit', $estampa->id) }}" class="btn btn-default btn-md">Voltar para o estampa</a>
                            <a href="{{ route('admin.estampas.images', $estampa->id) }}" class="btn btn-primary btn-md">Atualizar estampas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /main -->
   <!--/.main-->
@stop