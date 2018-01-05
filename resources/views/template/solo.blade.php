<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    @yield('meta')
    {{--CSS--}}
    @yield('css')
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
    {{--Fonts--}}
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700" rel="stylesheet">
    {{--Jquery--}}

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
@yield('content')

</body>
</html>