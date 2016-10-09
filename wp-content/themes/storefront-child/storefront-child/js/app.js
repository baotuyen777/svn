jQuery(document).ready(function () {
    setTimeout(function () {
        //back-to-top
        if (jQuery('#back-to-top').length) {
            var scrollTrigger = 200, // px
                    backToTop = function () {
                        var scrollTop = jQuery(window).scrollTop();
                        if (scrollTop > scrollTrigger) {
                            jQuery('#back-to-top').addClass('show');
                        } else {
                            jQuery('#back-to-top').removeClass('show');
                        }
                    };
            backToTop();
            jQuery(window).on('scroll', function () {
                backToTop();
            });
            jQuery('#back-to-top').on('click', function (e) {
                e.preventDefault();
                jQuery('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }

//get max-height block-items
         setTimeout(function () {
        jQuery('.block-items').each(function (index, el) {
            var maxHeight = 0;
            var elementHeights = jQuery(this).find('.item').map(function () {
                return jQuery(this).height();
            }).get();
            maxHeight = Math.max.apply(null, elementHeights);
            // if(jQuery(window).width()> 767){
                jQuery(this).find('.item').height(maxHeight);
            // }
        });
    }, 500);

    jQuery(window).resize(function () {
        document.body.style.overflow = "hidden";
        var windowWidth = jQuery(window).width();
        document.body.style.overflow = "";
        jQuery('.block-items').each(function (index, el) {
            jQuery(this).find('.item').css("height", 'auto');
        });
        jQuery('.block-items').each(function (index, el) {
            var maxHeight = 0;
            var elementHeights = jQuery(this).find('.item').map(function () {
                return jQuery(this).height();
            }).get();
            maxHeight = Math.max.apply(null, elementHeights);
           // if(jQuery(window).width()> 767){
                jQuery(this).find('.item').height(maxHeight);
            // }
        });
    });

//nice scroll
//    jQuery("#bookmarksView").niceScroll({cursorwidth: '5px', autohidemode: false, zindex: 999, cursorcolor: '#999999' });
        jQuery("#navbar .navbar-nav li").click(function () {
            jQuery(this).find('.sub-menu').toggle();
        });
    }, 500);
});