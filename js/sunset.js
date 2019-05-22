$ = jQuery.noConflict();

/* ===============================
    Add a varible to a div 
 ================================== */

$(function () {
    /* when the document is ready  */
    sunset_get_thumbn('.sunset-carousel-thumb');

});

$('.sunset-carousel-thumb').on('slid.bs.carousel' , function(){ // slid.bs : slide bootstrap
    sunset_get_thumbn('.sunset-carousel-thumb');
});

function sunset_get_thumbn(carousel){
    var nextThumb = $('.item.active').find('.next-image-preview').data('image');
    var prevThumb = $('.item.active').find('.prev-image-preview').data('image');

    //console.log(nextThumb);
    $(carousel).find('.right.carousel-control').find('.thumbnail-container').css({
        "background-image": "url(" + nextThumb + ")"
    });
    $(carousel).find('.left.carousel-control').find('.thumbnail-container').css({
        "background-image": "url(" + prevThumb + ")"
    });
}