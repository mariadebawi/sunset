jQuery(document).ready(function ($) {

    /* ===============================
        Add a varible to a div 
     ================================== */

    var carousel = '.sunset-carousel-thumb';

    sunset_get_bs_thumbs(carousel);

    $(carousel).on('slid.bs.carousel', function () { // slid.bs : slide bootstrap
        sunset_get_bs_thumbs(carousel);
    });

    function sunset_get_bs_thumbs(carousel) {
        $(carousel).each(function () { // we add function each case of i have many gallery so each gallery have it carousel 
            var nextThumb = $(this).find('.item.active').find('.next-image-preview').data('image'); /* .data() : give you the information in att dataa-x() ==> data-image() */
            var prevThumb = $(this).find('.item.active').find('.prev-image-preview').data('image');
            $(this).find('.carousel-control.right').find('.thumbnail-container').css({
                'background-image': 'url(' + nextThumb + ')'
            });
            $(this).find('.carousel-control.left').find('.thumbnail-container').css({
                'background-image': 'url(' + prevThumb + ')'
            });
        });
    }




    /* ===============================
          Ajax CUstom functions
 ================================== */

    $(document).on('click', '.sunset-load-more', function () {
        var that = $(this);
        var page = $(this).data('page');
        var ajaxUrl = $(that).data('url');
        var newPage = page+1 ;
        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                page: page,
                action: 'sunset_load_more' // function declarted en ajax.php
            },
            error: function (response) {
                console.log(Response);
            },
            success: function (response) {
                //console.log(response);
                that.data('page' , newPage) ; /* the next page  */
                $('.sunset_post_container').append(response);
            }
        });

    });




});