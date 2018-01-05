@if (Session::has('successdel'))
    <div class="alert bg-danger" role="alert">
        <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>{{ Session::get('successdel') }}
    </div>
@endif



