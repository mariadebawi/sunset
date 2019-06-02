jQuery(document).ready(function ($) {
    revealPostets(); /* function to animatethe article */


    // Declaration variable 
    var carousel = '.sunset-carousel-thumb';
    var last_scroll = 0;


    //Carousel Function
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


    // Ajax Functions

    $(document).on('click', '.sunset-load-more:not(.loading)', function () { //:not ==> desactivate a class
        var that = $(this);
        var page = that.data('page');
        var prev = that.data('prev');
        var archive = that.data('archive');
        
       // console.log("page : " + page) ;
        //console.log("prev : " + prev) ;
        //console.log("archive : " + archive) ;

        var ajaxUrl = $(that).data('url');
        var newPage = page + 1;
        if (typeof (prev) == undefined) {
            prev = 0;
        }
        if (typeof (archive) == undefined) {
            archive = 0;
           // console.log("archive : " + archive) ;

        }

        $(that).addClass('loading').find('.text').slideUp(320); // add class loadinf and disapare the text
        $(that).find('.sunset-icon').addClass('spin'); // add class spin to the icon 

        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                page: page,
                prev: prev,
                archive : archive ,
                action: 'sunset_load_more' // function declarted en ajax.php
            },
            error: function (response) {
                console.log(Response);
            },
            success: function (response) {
                //console.log(response);
                if (response == 0) {
                    $('.sunset_post_container').append('<div class="text-center"><h3> You reached the end of the line !!</h3> <p> No more posts to load</p></div>');
                    $(that).slideUp(320);

                } else {
                    setTimeout(function () {
                        if (prev == 1) {
                            $('.sunset_post_container').prepend(response); //previous
                            newPage = page - 1;
                        } else {
                            $('.sunset_post_container').append(response);// nexet 
                        }
                        if (newPage == 1) {
                            $(that).slideUp(320);
                        } else {
                            that.data('page', newPage); /* the next page  */
                            $(that).removeClass('loading').find('.text').slideDown(320);
                            $(that).find('.sunset-icon').removeClass('spin');
                        }
                        revealPostets(); /* function to animatethe article */
                    }, 1500) // delay the animation with setTimeout
                }
            }
        });

    });

    //Scroll Functions 
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (Math.abs(scroll - last_scroll) > $(window).height() * 0.1) {
            last_scroll = scroll;
            $('.page-limit').each(function (index) {
                if (isVisible($(this))) {
                    // console.log('visible') ;
                    history.replaceState(null, null, $(this).attr("data-page")); // change the url with attr(data-page)
                    return (false);
                }
            });
        }
    });


    // sidebar functions
   /* $(document).on('click', '.js-closeSidebar', function () { 
         $('.sunset-sidebar').addClass('sidebar-closed');
    });

    $(document).on('click', '.js-openSidebar', function () { 
        $('.sunset-sidebar').removeClass('sidebar-closed');
   });

*/
    $(document).on('click', '.js-ToggleSidebar', function () { 
     /* toggleClass = addClass +  removeClass :  if class sidebar-closed exist  remove it sinon add it   */
        $('.sunset-sidebar').toggleClass('sidebar-closed');
    });
 



    //functions helpers 
    function revealPostets() {
        $('[data-toggle="tooltip"]').tooltip() ; // add on edit post wordpress the tag of tooltip
        $('[data-toggle="popover"]').popover()

        var posts = $('article:not(.reveal)');
        var i = 0;
        setInterval(function () {
            if (i >= posts.length) return false;
            var el = posts[i];
            $(el).addClass('reveal');
            i++;
        }, 200);
    }

    function isVisible(element) {
        var scroll_pos = $(window).scrollTop();
        // console.log('scroll_pos = ' + scroll_pos) ;
        var window_height = $(window).height();
        //console.log('window_height = ' + window_height) ;
        var el_top = $(element).offset().top;
        // console.log('el_top  = ' + el_top) ;
        var el_height = $(element).height();
        // console.log('el_height  = ' + el_height) ;
        var el_bottom = el_top + el_height;
        // console.log('el_bottom  = ' + el_bottom) ;
        return ((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));
    }

});