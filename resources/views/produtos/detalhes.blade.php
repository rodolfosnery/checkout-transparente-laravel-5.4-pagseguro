@extends('template.template')
@section('meta')
    <title></title>
    <meta name="description" content="Criados pelo estilista Jedson Pereira, os biquínis e saídas de banho são produzidos com tecidos de alta de tecnologia e os melhores acessórios. Com jeitinho brasileiro e padrão internacional, a grife Brasil70 Bikini é a preferida nas mais famosas praias européias e brasileiras.">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/detalhes.css') }}">
@stop
@section('content')
    <div class="space"></div>
    <div class="detalhes">
        <div class="faixa-detalhes"></div>
        <div class="center">
            {!! Form::open(['route'=>['cart.addPro', $produto->id], 'method'=>'post', 'role'=>'form'])  !!}
            <h2>{{ $produto->segmento->titulo }} | {{ $produto->titulo }}</h2>
            <div class="faixa-cinza"></div>
            <div class="produtos-detalhes">
                <div class="thumbs">
                    <ul>
                        @foreach($produto->images as $image)
                            <li><img src="{{ url('img/produtos/thumb/'.$image->file_name) }}" alt="{{ route('solo', $image->file_name) }}"></li>
                        @endforeach
                    </ul>
                </div>

                <div class="cover foto-principal"><img src="{{ url('img/produtos/thumb/'.$produto->images->first()->file_name) }}">
                    <a class="linkt" href="{{ route('solo', $produto->images->first()->file_name) }}"><span class="lupa-detalhes"></span></a>
                </div>
                <div class="foto-principal">
                    <div class="container-preco">
                        <h2><strong>Leve o look completo {{ $produto->pecas->count() }} itens</strong></h2>
                        <div class="preco">R$ {{ number_format($total,2,',','.') }}</div>
                        {{ Form::hidden('preco', $total) }}
                        {{ Form::hidden('cartpro', $produto->id) }}
                        {{--<h3>3x sem juros R$ {{ number_format($total/3,2,',','.') }}</h3>--}}
                        <h3>Selecione um tamanho a baixo</h3>
                        <div class="tamanhos tamanho-conjunto">

                            @include('partials.erros-tamanho')
                            @foreach($produto->tamanhos as $tamanho)
                                <div class="radio">
                                    <input id="{{$tamanho->tamanho.$produto->id}}" name="tamanho" value="{{$tamanho->id}}" type="radio">
                                    <label for="{{$tamanho->tamanho.$produto->id}}" class="radio-label">{{$tamanho->tamanho}}</label>
                                </div>
                            @endforeach

                        </div>

            {!! Form::submit('ADICIONAR CONJUNTO', ['class' => 'btn-comprar']) !!}
            {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @foreach($produto->pecas as $peca)
                {!! Form::open(['route'=>['cart.add', $peca->id], 'method'=>'post', 'role'=>'form'])  !!}
                <div class="pecas-detalhes">
                    <div class="foto-pecas"><img src="{{ url('img/pecas/thumb/'.$peca->images->first()->file_name) }}">
                        <a href="{{ route('solo_pecas', $peca->images->first()->file_name) }}"><span class="lupa-detalhes"></span></a>
                        <div class="descricao">
                            <p>{!! $peca->descricao !!}</p>
                        </div>
                    </div>
                    <div class="info-detalhes">
                        <h2>{{ $peca->titulo }}</h2>
                        <h3>Cód.:{{ $peca->codigo }}</h3>
                        <div class="faixa-cinza"></div>
                        @if(!empty($peca->depor))
                            <h3 class="de">R$ {{ number_format($peca->depor,2,',','.') }}</h3>
                            <div class="preco">R$ {{ number_format($peca->preco,2,',','.') }}</div>
                        @else
                            <div class="preco">R$ {{ number_format($peca->preco,2,',','.') }}</div>
                        @endif
                        <h3>Selecione um tamanho a baixo</h3>
                        <div class="tamanhos">
                            <div class="container">
                                @include('partials.erros-tamanho')
                                @foreach($peca->tamanhos as $tamanho)
                                    <div class="radio">
                                        <input id="{{$tamanho->tamanho.$peca->id}}" name="tamanho" value="{{$tamanho->id}}" type="radio">
                                        <label for="{{$tamanho->tamanho.$peca->id}}" class="radio-label">{{$tamanho->tamanho}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="space"></div>
                {!! Form::submit('ADICONAR NA SACOLA', ['class' => 'btn-comprar']) !!}
                {!! Form::close() !!}
                </div>
                </div>
            @endforeach




            {{--Produto unico--}}
            {{--<div class="pecas-detalhes">--}}

                {{--<div class="info-detalhes">--}}
                    {{--<h2>Top Leonara</h2>--}}
                    {{--<h3>Cód.:1112333</h3>--}}
                    {{--<div class="faixa-cinza"></div>--}}
                    {{--<h3 class="de">R$ 200,00</h3>--}}
                    {{--<div class="preco">R$ 116,00</div>--}}
                    {{--<h3>Selecione o tamanho</h3>--}}
                    {{--<div class="tamanhos">--}}

                        {{--<div class="container">--}}
                            {{--<div class="radio">--}}
                                {{--<input id="m004" name="radio" value="m" type="radio">--}}
                                {{--<label for="m004" class="radio-label">M</label>--}}
                            {{--</div>--}}

                            {{--<div class="radio">--}}
                                {{--<input id="p004" name="radio" value="p" type="radio">--}}
                                {{--<label  for="p004" class="radio-label">P</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="space"></div>--}}
                    {{--<div class="descricao">--}}
                        {{--<p>Nnono nno nno nonon ononn onono nono nonon onon onnon onon nonon onon non onon onono nonon onn onon onon ono non ono</p>--}}
                    {{--</div>--}}
                    {{--<a href=""><div class="btn-comprar"><h1>ADICONAR NA SACOLA</h1></div></a>--}}
                {{--</div>--}}

            {{--</div>--}}



        </div>
    </div>
@stop
@section('js')
    <script src="{{ URL::asset('js/fotos-detalhes.js') }}"></script>
@stop


