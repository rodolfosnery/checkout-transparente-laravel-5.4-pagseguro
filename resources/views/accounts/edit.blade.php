@extends('template.template')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/table-cart.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/login-cliente.css') }}">
@stop
@section('content')
        <div class="center">
            <div><h1 class="titulo-paginas">SEU CADASTRO</h1></div>
            <br>
            <br>
            {!! Form::open(['route'=>['account.update', $user->id], 'method'=>'put', 'role'=>'form'])  !!}
            <table class="cadastrado total">
                <thead>
                @include('partials.erros')
                @include('partials.success')
                <tr>
                    <th><h2><span>Seus dados pessoais</span></h2>

                        <div class="coluna">
                            {!! Form::label('name', 'Nome*') !!}
                            {!! Form::text('name', $user->name, ['class' => 'big-', 'required']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="coluna">
                            {!! Form::label('sobrenome', 'Sobre Nome*') !!}
                            {!! Form::text('sobrenome', $user->sobrenome, ['class' => 'big-', 'required']) !!}
                            @if ($errors->has('sobrenome'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('sobrenome') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="coluna">
                            {!! Form::label('nascimento', 'Data de Nascimento*') !!}
                            {!! Form::text('nascimento', $user->nascimento, ['class' => 'big-', 'id' => 'nascimento', 'required']) !!}
                            @if ($errors->has('nascimento'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="coluna">
                            {!! Form::label('cpf', 'CPF*') !!}
                            {!! Form::text('cpf', $user->cpf, ['class' => 'big-', 'id' => 'cpf']) !!}<br>
                            @if ($errors->has('cpf'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="coluna">
                            {!! Form::label('sexo', 'Sexo') !!}
                            {!! Form::select('sexo', ['Feminino' => 'Feminino', 'Masculino' => 'Masculino'], $user->sexo, array('class' => 'appearance-select')) !!}
                            <br>
                            <br>
                        </div>

                    </th>
                </tr>
                </thead>
            </table>

                <table class="cadastrado total">
                    <thead>
                    <tr>
                        <th><h2><span>Endereço de entrega</span></h2>

                            <div class="coluna">
                                {!! Form::label('cep', 'CEP*') !!}
                                {!! Form::text('cep', $user->cep, ['class' => 'cep', 'id' => 'cep', 'required']) !!}
                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                        </span>
                                @endif
                                <a class="btn btn-link" href="{{ url('http://www.buscacep.correios.com.br/sistemas/buscacep/') }}" target="_blank">
                                    Não sabe seu CEP?
                                </a>

                            </div>

                            <div class="coluna">
                                {!! Form::label('rua', 'Endereço*') !!}
                                {!! Form::text('rua',$user->rua, ['class' => 'big-', 'required']) !!}
                                @if ($errors->has('rua'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rua') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="coluna">
                                {!! Form::label('numero', 'Numero*') !!}
                                {!! Form::text('numero', $user->numero, ['class' => 'smaller', 'required']) !!}
                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="coluna">
                                {!! Form::label('bairro', 'Bairro*') !!}
                                {!! Form::text('bairro', $user->bairro, ['class' => 'big-', 'required']) !!}
                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="coluna">
                                {!! Form::label('complemento', 'Complemento*') !!}
                                {!! Form::text('complemento', $user->complemento, ['class' => 'big-', 'required']) !!}
                                @if ($errors->has('complemento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="coluna">
                                {!! Form::label('telefone', 'Telefone*') !!}
                                {!! Form::text('telefone', $user->telefone, ['class' => 'big-', 'required', 'id' => 'telefone']) !!}
                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="coluna">
                                {!! Form::label('cidade', 'Cidade*') !!}
                                {!! Form::text('cidade', $user->cidade, ['class' => 'big-', 'required']) !!}
                                @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="coluna">
                                {!! Form::label('uf', 'UF*') !!}
                                {!! Form::text('uf', $user->uf, ['class' => 'smaller', 'required']) !!}
                                @if ($errors->has('uf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uf') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="coluna">
                                {!! Form::label('celular', 'Celular') !!}
                                {!! Form::text('celular', $user->celular, ['class' => 'big-', 'id' => 'celular']) !!}
                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <br>
                            </div>
                        </th>
                    </tr>
                    </thead>
                </table>
                <div class="btn-cadastro-conteiner">
                    {!! Form::submit('ALTERAR', ['class'=>'btn-cadastro']) !!}
                </div>
            </form>
        </div>
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

        jQuery(function($){
            $("#telefone").mask("(99) 9999-9999");
            $("#celular").mask("(99) 99999-9999");
            $("#cep").mask("99999-999");
            $("#cpf").mask("999.999.999-99");
            $("#nascimento").mask("99-99-9999");

        });

    </script>
@endsection
@section('js')
    <script src="{{ URL::asset('js/maskedinput.js') }}"></script>
@stop
