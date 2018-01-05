<div class="space"></div>
<div class="faixa-destaque"><h1>DESTAQUES</h1></div>
<div class="center">
    <ul class="destaques">
        @foreach($produtos as $produto)

            <li><a href="{{ route('produtos.detalhes', $produto->slug) }}"><img src="{{ url('img/produtos/thumb/'.$produto->images->first()->file_name) }}" alt="{{ $produto->titulo }}"></a>
                <h1>{{$produto->titulo}}</h1>

                @foreach($produto->pecas as $peca)
                    <h2>{{ $peca->titulo }}
                        @if(!empty($peca->depor))
                        <span class="depor"> de <span class="precodepor">R$ {{ number_format($peca->depor,2,',','.') }}</span></span>
                        <div class="preco">R$ {{ number_format($peca->preco,2,',','.') }}</div>
                        @else
                        <div class="preco">R$ {{ number_format($peca->preco,2,',','.') }}</div>
                        @endif
                    </h2>
                @endforeach

                <a href="{{ route('produtos.detalhes', $produto->slug) }}"><div class="btn-comprar"><h1>COMPRAR</h1></div></a>
            </li>

        @endforeach
    </ul>
</div>