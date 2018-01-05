<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Painel - Loja Brasil 70</title>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="{{ URL::asset('lumino/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('lumino/css/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('lumino/css/bootstrap-table.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('lumino/css/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dropzone/css/dropzone.css') }}">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="logo-admin" src="{{ url('img/logo.svg') }}"></a>
            <ul class="user-menu">`
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/') }}" target="_blank"><svg class="glyph stroked desktop"><use xlink:href="#stroked-desktop"/></svg> Site</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <br>
    <ul class="nav menu">
        <li><a href="{{ url('/admin') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Dashboard</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="#"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Banner Principal</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{ route('admin.collections.index') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>Coleções</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{ route('admin.segmentos.index') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Segmentos</a></li>
        <li><a href="{{ route('admin.modelos.index') }}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>Modelos</a></li>
        <li><a href="{{ route('admin.tamanhos.index') }}"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>Tamanhos</a></li>
        <li><a href="{{ route('admin.estampas.index') }}"><svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg>Estampas</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{ route('admin.produtos.index') }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Produtos</a></li>
        <li><a href="{{ route('admin.pecas.index') }}"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"/></svg>Peças</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{ route('admin.orders.index') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Pedidos</a></li>
    </ul>
</div><!--/.sidebar-->

@yield('content')
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ URL::asset('lumino/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('lumino/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('lumino/js/chart.min.js') }}"></script>
<script src="{{ URL::asset('lumino/js/chart-data.js') }}"></script>
<script src="{{ URL::asset('lumino/js/easypiechart.js') }}"></script>
<script src="{{ URL::asset('lumino/js/easypiechart-data.js') }}"></script>
<script src="{{ URL::asset('lumino/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('lumino/js/bootstrap-table.js') }}"></script>
<script src="{{ URL::asset('lumino/js/lumino.glyphs.js') }}"></script>
<script src="{{ URL::asset('dropzone/js/dropzone.js') }}"></script>
<script src="{{ URL::asset('js/maskedinput.js') }}"></script>
<script src="{{ URL::asset('js/speakingurl.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.maskMoney.js') }}"></script>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
{{--<script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>--}}
{!! Html::script('js/dropdown.js') !!}


<script type="text/javascript">
{{--Tabelas--}}
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                    .bootstrapTable({
                        classes: classes,
                        striped: $('#striped').prop('checked')
                    });
        });
    });
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
{{--calendario--}}
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })

{{--Campo Moeda--}}
    $(document).ready(function(){
        $("input.preco, input.depor").maskMoney({showSymbol:true, symbol:"", decimal:".", thousands:""});
    });
//mascara input

//jQuery(function($){
//    $("#estoque").mask("9");
//    $(".preco").mask("99999.99");
//});

{{--Slug--}}
    jQuery(document).ready(function(){
        $("#titulo, #tamanho, #estampa").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
{{--selec2--}}
    $("#estampas").select2();

    {{--Editor--}}
        tinymce.init({
        selector: 'textarea',
        height: 200,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]

    });

</script>
</body>
</html>
