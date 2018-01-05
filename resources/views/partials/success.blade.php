@if (Session::has('success'))
    <div class="bg-success">
        <img src="{{ url('img/check.svg') }}">
        <span>{{ Session::get('success') }}</span>
    </div>
@endif



