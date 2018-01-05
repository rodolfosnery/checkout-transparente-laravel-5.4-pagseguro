<div class="space"></div>
<div class="footer">
    <div class="faixa-footer"></div>
    <div class="center">
        <div class="container-news">
            <div class="container-text-news">
                <h2><strong>Assine nossa newsletter</strong></h2>
                <h3>Promoções e coleções novas</h3>
            </div>

            <div class="container-form-news">
                {!! Form::open(['url'=>'/home','method'=>'post']) !!}
                <input type="text" name="email" id="email" placeholder="E-mail" required="required">
                <button type="submit">OK</button>
                {!! Form::close() !!}
            </div>


        </div>
        <div class="container-redes">
            <ul>
                <li><span>Redes Sociais</span></li>
                <li><img src="{{ url('img/icones/icone_ig.png') }}"></li>
                <li><img src="{{ url('img/icones/icone_fb.png') }}"></li>
            </ul>
        </div>
    </div>
    <div class="space"></div>
    <div class="info-footer">
        <div class="center">
            <div class="endereco">
                <p><strong>LOJA E ATELIÊ</strong><br>
                Whatsapp: (62) 98166.2970<br>
                Fone: (62) 3945.5170<br>
                Av. Leonardo da Vinci, n. 841, jd. da luz - Goiânia<br><br>

                <strong>LOJA GALERIA 1</strong><br>
                Fone: (62) 3092.2412
                </p>
            </div>
            <div class="institucional">
                <p><strong>INSTITUCIONAL</strong></p>
                <ul>
                    <li><a href="#">Empresa</a></li>
                    <li><a href="#">Central de Atendimento</a></li>
                    <li><a href="#">Politicas</a></li>
                    <li><a href="#">Troca de Devolução</a></li>
                    <li><a href="#">Segurança</a></li>
                </ul>
            </div>
            <div class="pagamento">
                <p><strong>FORMAS DE PAGAMENTO</strong></p>
                <img src="{{ url('img/bandeiras_cartoes.png') }}">
            </div>
            <div class="seguranca">
                <p><strong>SEGURANÇA</strong></p>
                <img src="{{ url('img/certificado-digital.png') }}">
            </div>
        </div>
    </div>
    <div class="center">
    <div class="copy"><p>© 2017 Brasil 70 Bikini - Todos os direitos reservados</p></div>
    </div>
</div>