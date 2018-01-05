@extends('template.template')
@section('meta')
    <title></title>
    <meta name="description" content="Criados pelo estilista Jedson Pereira, os biquínis e saídas de banho são produzidos com tecidos de alta de tecnologia e os melhores acessórios. Com jeitinho brasileiro e padrão internacional, a grife Brasil70 Bikini é a preferida nas mais famosas praias européias e brasileiras.">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/lista-produtos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/filtro.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/produtos.css') }}">
@stop
@section('content')
    <div class="space"></div>
    <div class="bg-lista">
        <div class="center">
            @include('elements.filtro-estampa')
            <?php $data = date('Y-m-d', strtotime('-7 day'));?>
            <div class="titulo-pagina">Biquínis</div>
        </div>
        <div class="space"></div>
        <div class="center">
            <div id="Container" class="container">
                <div class="fail-message"><span>Nenhum item foi encontrado, comforme filtros selecionados</span></div>
                <ul class="produtos">

                        @foreach($estampa->produtos as $produto)

                            <li class="mix @if($data < $produto->created_at) novidade @endif @foreach($produto->pecas as $peca) {{$peca->modelo->slug}} @foreach($peca->tamanhos as $tamanho) {{$tamanho->slug}}@endforeach @endforeach">
                                <a href="{{ route('produtos.detalhes', $produto->slug) }}"><img src="{{ url('img/produtos/thumb/'.$produto->images->first()->file_name) }}"></a>
                                <h1>{{ $produto->titulo }}</h1>

                                @foreach($produto->pecas as $peca)
                                    <h2>{{ $peca->titulo }}
                                        @if(!empty($peca->depor))
                                            <span class="depor"> de <span class="precodepor">R$ {{ $peca->depor }}</span></span></h2>
                                    @endif
                                    <div class="preco">R$ {{ number_format($peca->preco,2,',','.') }}</div>
                                    @foreach($peca->tamanhos as $tamanho)
                                        {{ $tamanho->tamanho }}
                                    @endforeach

                                @endforeach
                                <a href="{{ route('produtos.detalhes', $produto->slug) }}"><div class="btn-comprar"><h1>COMPRAR</h1></div></a>
                            </li>

                        @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ URL::asset('js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ URL::asset('js/mixitup.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.jscrollpane.min.js') }}"></script>
@stop
