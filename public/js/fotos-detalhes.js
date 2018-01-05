$(function(){

    $('.thumbs img').click(function(){
        var cover = $('.cover img');
        var thumb = $(this).attr('src');

        var linktemp = $(this).attr('alt');

        $("a.linkt").attr('href', linktemp);

        if(cover.attr('src') !== thumb){
            cover.fadeTo('200', '0', function(){
                cover.attr('src', thumb);
                cover.fadeTo('150', '2');

            });
        }
    });

});