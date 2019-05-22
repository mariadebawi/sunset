/*$ = jQuery.noConflict();

/* ===============================
    Add a varible to a div 
 ================================== */
/*
$(function () {
    /* when the document is ready  */
/*    sunset_get_thumbn('.sunset-carousel-thumb');

});

$('.sunset-carousel-thumb').on('slid.bs.carousel' , function(){ 
    sunset_get_thumbn('.sunset-carousel-thumb');
});

function sunset_get_thumbn(carousel){
    $(carousel).each(function(){
        var nextThumb = $('.item.active').find('.next-image-preview').data('image');
       var prevThumb = $('.item.active').find('.prev-image-preview').data('image');

        //console.log(nextThumb);
        $(this).find('.right.carousel-control').find('.thumbnail-container').css({
            "background-image": "url(" + nextThumb + ")"
        });
        $(this).find('.left.carousel-control').find('.thumbnail-container').css({
            "background-image": "url(" + prevThumb + ")"
    });
    });
   
}
*/
jQuery(document).ready(function ($) {
    //custom Sunset scripts

    var carousel = '.sunset-carousel-thumb'; 

    sunset_get_bs_thumbs(carousel);

    $(carousel).on('slid.bs.carousel', function () { // slid.bs : slide bootstrap
        sunset_get_bs_thumbs(carousel);
    });

    function sunset_get_bs_thumbs(carousel) { 
        $(carousel).each(function () { // we add function each case of i have many gallery so each gallery have it carousel 
            var nextThumb = $(this).find('.item.active').find('.next-image-preview').data('image');
            var prevThumb = $(this).find('.item.active').find('.prev-image-preview').data('image');
            $(this).find('.carousel-control.right').find('.thumbnail-container').css({
                'background-image': 'url(' + nextThumb + ')'
            });
            $(this).find('.carousel-control.left').find('.thumbnail-container').css({
                'background-image': 'url(' + prevThumb + ')'
            });
        });
    }

});