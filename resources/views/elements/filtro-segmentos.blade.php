<div class="filtro">
    <form class="controls niceform" id="Filters">
        <div class="container-filtro filtro-titulo">
            <ul>
                <fieldset class="titulo-filtro">
                    <h3>FILTROS</h3>
                </fieldset>
            </ul>
        </div>


        <div class="container-filtro novidades">
            <ul>
                <fieldset>
                    <h3>NOVIDADES</h3>
                    <div class="checkbox">
                        <li>{!! Form::checkbox('novidade', '.novidade'); !!}<span> Esta semana</span></li>
                    </div>
                </fieldset>
            </ul>
        </div>

        <div class="container-filtro modelos">
            <ul>
                <fieldset>
                    <h3>MODELOS</h3>
                    <div class="checkbox">
                        @foreach($segmento->modelos as $modelo)
                            <li>{!! Form::checkbox('modelo', '.'.$modelo->slug) !!}<span> {{$modelo->titulo}} ({{$modelo->pecas->count()}})</span></li>
                        @endforeach
                    </div>
                </fieldset>
            </ul>
        </div>

        <div class="container-filtro tamanhos">
            <ul>
                <fieldset>
                    <h3>TAMANHOS</h3>
                    <div class="checkbox">
                        @foreach($tamanhos as $tamanho)
                            <li>{!! Form::checkbox('tamanho', '.'.$tamanho->slug) !!}<span> {{$tamanho->tamanho}}</span></li>

                        @endforeach
                    </div>
                </fieldset>
            </ul>
        </div>

        <div class="container-filtro estampas">
            <ul>
                <fieldset>
                    <h3>ESTAMPAS</h3>
                    <div class="checkbox">

                            @foreach($estampas as $estampa)
                                <li><a href="{{ route('estampas', $estampa->slug) }}">
                                        <img src="{{ url('img/estampas/thumb/'.$estampa->images->first()->file_name) }}"></a>
                                </li>
                            @endforeach

                    </div>
                </fieldset>
            </ul>
        </div>
    </form>

    {{--<div class="modelos"></div>--}}
    {{--<div class="tamanhos"></div>--}}
    {{--<div class="estampas"></div>--}}
</div>
