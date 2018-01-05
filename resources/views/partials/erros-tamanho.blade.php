@if($errors->any())
    <div class="tamanho-required">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    <div class="seta-pra-baixo"></div>
@endif