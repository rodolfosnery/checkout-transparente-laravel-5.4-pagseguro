<div class="center">
    <div class="logo"><a href="{{ url('/') }}"><img src="{{ url('img/logo.svg') }}"></a></div>
    <div class="menu-container">
        <div class="menu">
            <ul>
                <li><a href="#">Liquidação</a></li>
                @foreach($segmentos as $segmento)
                    <li><a href="{{ url('segmento/'.$segmento->slug)}}">{{$segmento->titulo}}</a>
                        {{--<ul>--}}
                            {{--@foreach($segmento->modelos as $modelo)--}}
                                {{--<li><a href="{{ route('modelo', $modelo->slug) }}"><img src="{{ url('img/icones/calsinha.svg') }}">{{$modelo->titulo}}</a></li>--}}
                                {{--<li><a href="#">{{$modelo->titulo}}</a></li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    </li>
                @endforeach
                <li><a href="#">Acessórios</a></li>
                <li><a href="#">Estampas</a></li>
                <li><a href="#">Outlet</a></li>
            </ul>
        </div>
    </div>
</div>