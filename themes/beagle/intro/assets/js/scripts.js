/*
    Template Name: Nppy
    Created By: TrendyTheme
    Envato Profile: https://themeforest.net/user/trendytheme
    Website: http://trendytheme.net
    Version: 1.0
    Support: http://trendytheme.net/support
*/

;(function () {

    "use strict"; // use strict to start

    $(document).ready(function () {



        /* === Preloader === */
        $(".tt-preloader-wave").fadeOut();
        $("#tt-preloader").delay(200).fadeOut("slow").remove();



        /* === Page scrolling feature - requires jQuery Easing plugin === */
        $('a.page-scroll').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });


        /* === Hero Parallax Effect === */
        (function () {
            var window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }
        }());


        /* === magnificPopup === */
        if ($('.popup-video').length > 0) {
            $('.popup-video').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }


        /* ======= Stellar for background scrolling ======= */
        if ($('.parallax-bg').length > 0) {
            $('.parallax-bg').imagesLoaded( function() {

              $(window).stellar({
                    horizontalScrolling: false,
                    verticalOffset: 0,
                    horizontalOffset: 0,
                    responsive: true,
                    hideDistantElements: true
                });
            });
        }


        /* === Detect IE version === */
        (function () {
            
            function getIEVersion() {
                var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
                return match ? parseInt(match[1], 10) : false;
            }

            if( getIEVersion() ){
                $('html').addClass('ie'+getIEVersion());
            }

        }());



        /* === Animation on Scroll === */ 
        var wow = new WOW({
              boxClass:     'wow',      // animated element css class (default is wow)
              animateClass: 'animated', // animation css class (default is animated)
              offset:       0,          // distance to the element when triggering the animation (default is 0)
              mobile:       false,       // trigger animations on mobile devices (default is true)
              live:         false        // act on asynchronously loaded content (default is true)
            });
        wow.init();



        /* === Screenshot Carousel function === */  
        function getSlide() {
            var wW = $(window).width();
            if (wW < 601) {
                return 1;
            }
            return 3;
        }

        /* === Screenshot Carousel === */           
        var mySwiper = $('.swiper-container').swiper({
      
            mode:'horizontal',
            loop: true,
            speed: 400,
            effect: 'coverflow',
            slidesPerView: getSlide(),
            grabCursor: true,
            nextButton: '.arrow-right',
            prevButton: '.arrow-left',
            keyboardControl: true,
            coverflow: {
                rotate: 0,
                stretch: 90,
                depth: 200,
                modifier: 1,
                slideShadows : true
            }
        });


        /* === Circle Thumb Testimonial === */
        if ($('.thumb-carousel').length > 0) {
            $('.thumb-carousel').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }

        /* === Featured item carousel === */
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:30,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });

        /* === Counter === */
        $('.facts-wrapper').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $(this).find('.timer').each(function () {
                    var $this = $(this);
                    $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
                $(this).off('inview');
            }
        });

        /* === Back to Top === */
        $(window).scroll(function(event){
            var scroll = $(window).scrollTop();
            if (scroll >= 50) {
                $("#backTop").addClass("show");
            } else {
                $("#backTop").removeClass("show");
            }
        });


    });


})(jQuery);





// Demo Switcher

function setActiveStyleSheet(cssName){
    var scheme = $('link[href*="css/colors/color"]');
    scheme.attr('href','assets/css/colors/'+cssName+'.css');
}


$("#hide, #show").click(function (e) {
    e.preventDefault();

    if ($("#show").is(":visible")) {
       
        $("#show").animate({
            "margin-right": "-300px"
        }, 300, function () {
            $(this).hide();
        });
        
        $("#switch").animate({
            "margin-right": "0px"
        }, 300).show();
    } else {
        $("#switch").animate({
            "margin-right": "-300px"
        }, 300, function () {
            $(this).hide();
        });
        $("#show").show().animate({
            "margin-right": "0"
        }, 300);
    }
});