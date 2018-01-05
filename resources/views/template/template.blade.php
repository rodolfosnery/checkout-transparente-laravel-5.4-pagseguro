<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    @yield('meta')
    {{--CSS--}}
    @yield('css')
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/busca.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsiveslides.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/inputs.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">
    {{--<link rel="stylesheet" href="{{ URL::asset('css/select.css') }}">--}}

    {{--Fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    {{--Jquery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Navigation
    ==========================================-->
<div class="top">
    <div class="center">
        <div class="info-fixo">
            <ul>
                <li><a href="#">FRETE GRÁTIS<img src="{{ url('img/icones/frete.svg') }}"></a></li>
                <li><a href="#">TROCAS<img src="{{ url('img/icones/troca.svg') }}"></a></li>
                <li><a href="#">ATÉ<img src="{{ url('img/icones/5x.svg') }}">SEM JUROS</a></li>
            </ul>
        </div>
        <div class="info-user">
            <ul>
                @if(Auth::guest())

                    @if(!empty($cart->all()))
                        <li><a class="saccart" href="{{ route('cart') }}">SACOLA<img src="{{ url('img/icones/sacola_cheia.svg') }}">
                        <span class="countcart">{{ count($cart->all()) }}</span></a>
                        </li>
                    @else
                        <li><a class="saccart" href="{{ route('cart') }}">SACOLA<img src="{{ url('img/icones/sacola_vazia.svg') }}"></a></li>
                    @endif
                        <li><a href="{{ route('login') }}">ENTRE</a> OU <a href="{{ url('/cadastro') }}">CADASTRE-SE</a></li>

                @else

                    @if(!empty($cart->all()))
                        <li><a class="saccart" href="{{ route('cart') }}">SACOLA<img src="{{ url('img/icones/sacola_cheia.svg') }}">
                        <span class="countcart">{{ count($cart->all()) }}</span></a>
                        </li>
                    @else
                        <li><a class="saccart" href="{{ route('cart') }}">SACOLA<img src="{{ url('img/icones/sacola_vazia.svg') }}"></a></li>
                    @endif
                        <li><a href="{{ route('account.orders') }}">MINHA CONTA</a> OU <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SAIR</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                @endif

            </ul>
        </div>
    </div>
</div>
@include('elements.menu')
@include('elements.busca')
@yield('content')
@include('elements.footer')

{{--Analytics--}}
{{--<script>--}}
    {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
                {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
            {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
    {{--})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');--}}

    {{--ga('create', 'UA-24361495-41', 'auto');--}}
    {{--ga('send', 'pageview');--}}

{{--</script>--}}
    @yield('js')
    <script src="{{ URL::asset('js/menu.js') }}"></script>
    <script src="{{ URL::asset('js/responsiveslides.min.js') }}"></script>
</body>
</html>