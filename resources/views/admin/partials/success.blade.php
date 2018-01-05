@if (Session::has('success'))
    <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use>
        </svg>{{ Session::get('success') }}
    </div>
@endif



