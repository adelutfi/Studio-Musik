(function ($) {
    "use strict";


            // veno box active
            $('.venobox').venobox();


    jQuery(document).ready(function ($) {
        /**-------------------------------
         * - wow js init
         * ---------------------------**/
        new WOW().init();

        /**------------------------
         * Music Slider
         * ---------------------**/
        var $misicSliderClass = $('.misicSliderClass');
        $misicSliderClass.owlCarousel({
            loop: true,
            autoplay: true,
            autoPlayTimeout: 1000,
            margin: 30,
            dots: false,
            nav: true,
            smartSpeed: 1500,
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                992: {
                    items: 2
                }
            }
        });



        // gallery Carosul
        /*---------------------------
                Product Details carousel
        ---------------------------*/
        //owl carousel activate function 
        $('#gallery-slider').owlCarousel({
            autoplay: true,
            autoplayTimeout: 4000,
            loop: true,
            items: 1,
            center: true,
            nav: false,
            thumbs: true,
            thumbImage: false,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',

        });


        /*---------------------------------
    Portfolio Masonry activation
----------------------------------*/
        var PortflioContainer = $('#project-masonry');
        if (PortflioContainer.length > 0) {
            PortflioContainer.imagesLoaded(function () {
                var latestWorkMasonry = $('#project-masonry').isotope({
                    itemSelector: '.grid-size',
                    percentPosition: true,
                    gutter: 0,
                    masonry: {
                        columnWidth: 0
                    }
                });
                $(document).on('click', '.our-project-menu ul li', function () {
                    var filterValue = $(this).attr('data-filter');
                    latestWorkMasonry.isotope({
                        filter: filterValue
                    });
                });
            });
        }
        /*---------------------------------
        Portfolio Filter Menu Active class
        ----------------------------------*/
        var portfoliofilterMenu = '.our-project-menu ul li';
        $(document).on('click', portfoliofilterMenu, function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });





        /*-------------------
            back to top
        --------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
    });


    $(window).on('scroll', function () {

        /*----------------------------------
		    back to top show/hide
		----------------------------------*/
        var ScrollTop = $('.back-to-top');

        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
        var scroll = $(window).scrollTop();    
        if (scroll > 1 ) {
            $("nav.navbar").addClass("bgdark");
        }else{
            $("nav.navbar").removeClass("bgdark");
        }


    });

    $(window).on('load', function () {

        /*---------------------
            Preloader
        -----------------------*/
        var preLoder = $("#preloader");
        preLoder.addClass('hide');
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);

    });

}(jQuery));


