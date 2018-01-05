<div id="wrapper">
    <ul class="rslides" id="slider1">
        {{--@foreach($banner->images as $image)--}}
            {{--<li><img src="{{ url('img/banner/'.$image->file_name) }}" alt=""></li>--}}
        {{--@endforeach--}}

        <li><a href="#"><img src="{{ url('img/banner/01.jpg') }}"></a></li>
        <li><a href="#"><img src="{{ url('img/banner/02.jpg') }}"></a></li>

    </ul>
</div>

<script>
    $(function () {
        $("#slider1").responsiveSlides({
            auto: true,
            speed: 1200,
            timeout: 4000,
            pager: false,
            pause: true,
            pauseControls: true,
            nav: false,
            prevText: "Anterior",
            nextText: "Proximo",
        });
    });
</script>