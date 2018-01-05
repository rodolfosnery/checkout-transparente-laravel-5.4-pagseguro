@if($errors->any())
    <div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
        @foreach($errors->all() as $error)
            <strong>
                {{ $error }}
            </strong>
        @endforeach <a href="#" class="pull-right"><span class="glyphicon"></span></a>
    </div>
@endif