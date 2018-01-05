@extends('template.solo')
@section('meta')
    <title></title>
    <meta name="description" content="Criados pelo estilista Jedson Pereira, os biquínis e saídas de banho são produzidos com tecidos de alta de tecnologia e os melhores acessórios. Com jeitinho brasileiro e padrão internacional, a grife Brasil70 Bikini é a preferida nas mais famosas praias européias e brasileiras.">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/solo.css') }}">
@stop
@section('content')
    <div class="faixa-solo">
        <a href="{{ $_SERVER['HTTP_REFERER'] }}"><h3>VOLTAR PARA O SITE</h3></a>
    </div>
    <div class="foto-solo">
        <img src="{{ url('img/produtos/'.$image->file_name) }}">
    </div>
@stop