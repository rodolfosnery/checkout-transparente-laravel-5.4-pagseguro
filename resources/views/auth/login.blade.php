@extends('template.template')
@section('meta')
    <title></title>
    <meta name="description" content="">
@stop
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/login-cliente.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/table-cart.css') }}">
@stop
@section('content')
    <section class="login">
        <div class="center">
            <div class="top-titulo-cart"><h2>IDENTIFICAÇÃO</h2></div>
            <br>
            <br>
            <table class="cadastrado">
                <thead>
                <tr>
                    <th><h2><span>Já sou cadastrado</span></h2>
                        <form role="form" class="form-login" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            {!! Form::label('mail', 'E-mail*') !!}
                            {!! Form::text('email', old('email'), ['class' => 'big', 'required']) !!}<br>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif

                            {!! Form::label('senha', 'Senha*') !!}
                            {!! Form::password('password', null, ['class' => 'smaller', 'required']) !!}<br>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif

                            <a href="{{ url('/password/reset') }}">
                                Esqueceu sua senha?
                            </a>

                            {!! Form::submit('ENTRAR', ['class'=>'btn-entrar']) !!}
                        </form>
                    </th>
                </tr>
                </thead>
            </table>
            <table class="novo-cliente">
                <thead>
                <tr>
                    <th><h2><span>Quero me cadastrar!</span></h2>

                        <form class="form-horizontal" role="form" method="GET" action="{{ route('cadastro.cliente') }}">

                            {!! Form::label('email', 'E-mail*') !!}
                            {!! Form::text('email', old('email'), ['class' => 'big', 'required']) !!}<br>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            {!! Form::label('cpf', 'CPF*') !!}
                            {!! Form::text('cpf', old('cpf'), ['class' => 'smaller cep', 'required' , 'id' => 'cpf']) !!}
                            @if ($errors->has('cpf'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                            @endif
                            <br>
                            <br>
                            <div class="space"></div>
                            {!! Form::submit('CADASTRAR', ['class'=>'btn-entrar']) !!}
                        </form>
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

    <script type="text/javascript" >
        jQuery(function($){

            $("#cpf").mask("999.999.999-99");

        });
    </script>

@stop
@section('js')
    <script src="{{ URL::asset('js/maskedinput.js') }}"></script>
@stop
