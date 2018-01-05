@extends('admin.template.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editar produto {{ $produto->titulo }}</h1>
            </div>
        </div><!--/.row-->

        {!! Form::open(['route'=>['admin.produtos.update', $produto->id], 'method'=>'put', 'role'=>'form'])  !!}

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
                                @if($produto->status > 1)
                                    {!! Form::label('status', 'Exibir no site:') !!}
                                    {!! Form::select('status', array('1' => 'Ativo', '2' => 'Bloqueado'), $produto->status, ['class'=>'form-control vermelho_select']); !!}
                                @else
                                    {!! Form::label('status', 'Exibir no site:') !!}
                                    {!! Form::select('status', array('1' => 'Ativo', '2' => 'Bloqueado'), $produto->status, ['class'=>'form-control verde_select']); !!}
                                @endif

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                @if($produto->destaque > 1)
                                    {!! Form::label('destaque', 'Destaque:') !!}
                                    {!! Form::select('destaque', array('1' => 'Ativo', '2' => 'Bloqueado'), $produto->destaque, ['class'=>'form-control vermelho_select']); !!}
                                @else
                                    {!! Form::label('destaque', 'Destaque no site:') !!}
                                    {!! Form::select('destaque', array('1' => 'Ativo', '2' => 'Bloqueado'), $produto->destaque, ['class'=>'form-control verde_select']); !!}
                                @endif

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                @if($produto->outlet > 1)
                                    {!! Form::label('outlet', 'Outlet:') !!}
                                    {!! Form::select('outlet', array('1' => 'Sim', '2' => 'Não'), $produto->outlet, ['class'=>'form-control vermelho_select']); !!}
                                @else
                                    {!! Form::label('outlet', 'Outlet:') !!}
                                    {!! Form::select('outlet', array('1' => 'Sim', '2' => 'Não'), $produto->outlet, ['class'=>'form-control verde_select']); !!}
                                @endif

                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        {!! Form::hidden('segmento_id', $produto->segmento->id) !!}

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('segmento_id', 'Segmento:') !!}
                                {!! Form::select('segmento_id', [$produto->segmento->titulo], null, ['class'=>'form-control', 'disabled']) !!}
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('collection_id', 'Coleção:') !!}
                                {!! Form::select('collection_id', $collections, $produto->collection->id, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('codigo', 'Codigo:') !!}
                                {!! Form::text('codigo', $produto->codigo, ['class'=>'form-control']) !!}
                            </div>
                        </div>


                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('titulo', 'Titulo:') !!}
                                {!! Form::text('titulo',  $produto->titulo, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('slug', 'Slug:') !!}
                                {!! Form::text('slug', $produto->slug, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('preco', 'Preço final:') !!}
                                {!! Form::text('preco', $produto->preco, ['class'=>'form-control preco']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('depor', 'Preço sem desconto:') !!}
                                {!! Form::text('depor', $produto->depor, ['class'=>'form-control depor']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('descricao', 'Descrição:') !!}
                                {!! Form::textarea('descricao', $produto->descricao, ['class'=>'form-control', 'rows'=>8]) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>Tamanhos e quantidades</div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data2.json" >
                            <thead>
                            <tr>
                                <th data-field="tamanho">Tamanho</th>
                                <th data-field="quantidade">Quantidade</th>
                                <th data-field="acoes">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tamanhos as $tamanho)
                                <tr>
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
                        <br>
                        <a href="{{ route('admin.produtos.tamanhos', $produto->id) }}"
                           class="btn btn-info">+ Tamanhos e quantidades</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg>Estampas</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <select name="estampas[]" id="estampas" class="form-control" multiple>
                                @foreach ($allEstampas as $estampa)
                                    <option @if (in_array($estampa, $estampas)) selected @endif
                                    value="{{ $estampa }}">
                                        {{ $estampa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <ul class="estampas">
                            @foreach($produto->estampas as $estampa)
                                <li><img src="{{ url('img/estampas/thumb/'.$estampa->images->first()->file_name) }}"></li>
                            @endforeach
                        </ul>
                        <br>
                        <button type="submit" class="btn btn-info"
                                name="action" value="continue">
                            Atualizar estampa
                        </button>
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
                            @foreach ($produto->images as $image)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{ url('img/produtos/thumb/'.$image->file_name) }}">
                                        <br>
                                        <div class="caption">
                                            <p><a href="{{ route('admin.imagesprodutos.destroy', ['id' => $image->id]) }}" class="btn btn-xs btn-danger" role="button">Excluir</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <a href="{{ route('admin.produtos.images', $produto->id) }}"
                           class="btn btn-warning">
                            <i class="glyphicon glyphicon-picture"></i> + Fotos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Peças</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data2.json" >
                        <thead>
                        <tr>
                            <th data-field="titulo">Titulo Peça</th>
                            <th data-field="tamanhos">Tamanhos</th>
                            <th data-field="estampas">Modelo</th>
                            <th data-field="foto">Foto</th>
                            <th data-field="acoes">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produto->pecas as $peca)
                            <tr>
                                <td>{{ $peca->titulo }}</td>
                                <td>
                                    @foreach($peca->tamanhos as $tamanho)
                                    {{ $tamanho->tamanho }}
                                    @endforeach
                                </td>
                                <td>
                                    {{$peca->modelo->titulo}}
                                </td>
                                <td>
                                    @if($peca->images->count()>0)
                                        <img src="{{ url('img/pecas/thumb/'.$peca->images->first()->file_name) }}">
                                    @endif

                                </td>
                                <td>

                                    <a href="{{ route('admin.pecas.edit', $peca->id) }}"
                                       class="btn btn-sm btn-default">
                                        <i class="glyphicon glyphicon-list-alt"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <a href="{{ route('admin.pecas.createproduto', $produto->id) }}"
                       class="btn btn-info">+ Pecas</a>
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
            <br>
            <br>
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
                                Lixeira
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
                        Tem certeza que quer colocar o produto {{ $produto->titulo }}, na lixeira?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.produtos.destroy', $produto->id) }}">
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








