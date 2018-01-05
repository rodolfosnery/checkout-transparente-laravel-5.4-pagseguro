<div class="center">
    <div class="busca">
        {!! Form::open(['url'=>'/home','method'=>'post']) !!}
        <input type="text" name="email" id="email" placeholder="Buscar" required="required">
        <button type="submit" class="btn-busca"></button>
        {!! Form::close() !!}
    </div>
</div>