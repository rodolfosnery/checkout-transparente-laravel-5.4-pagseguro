@extends('template.template')
@section('meta')
    <title>Brasil70 Bikini</title>
    <meta name="description" content="Criados pelo estilista Jedson Pereira, os biquínis e saídas de banho são produzidos com tecidos de alta de tecnologia e os melhores acessórios. Com jeitinho brasileiro e padrão internacional, a grife Brasil70 Bikini é a preferida nas mais famosas praias européias e brasileiras.">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/destaques.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/atalhos.css') }}">
@stop
@section('content')
    @include('elements.banner-principal')
    @include('elements.atalhos')
    @include('elements.destaques')
    <div class="home"></div>
@stop