!(function ($) {
    "use strict";

    /* Toggle menu mobile */
    function AmetexToggleMenuMobile() {
        $('.bt-header .bt-menu-toggle').on('click', function () {
            $(this).toggleClass('active');
            $('.bt-header .bt-menu-mobile').toggleClass('active');
        });
    }

    /* Toggle sub menu vertical */
    function AmetexToggleSubMenu() {
        var hasChildren = $('.bt-header .bt-menu-mobile ul li.menu-item-has-children');

        hasChildren.each(function () {
            var $btnToggle = $('<div class="menu-toggle"></div>');
            $(this).append($btnToggle);
            $btnToggle.on('click', function (e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).parent().children('ul').toggle('slow');
            });
        });
    }

    /* Footer Stick */
    function AmetexFooterStick() {
        if ($('.bt-footer').hasClass('bt-stick')) {
            var f_height = parseInt($('.bt-footer').innerHeight()),
                f_space = parseInt($('.bt-footer').data('space'));

            $('#bt-main .bt-header').css({"position": "relative", "z-index": "999"});
            $('#bt-main .bt-titlebar').css({"position": "relative", "z-index": "3"});
            $('#bt-main .bt-main-content').css({
                "position": "relative",
                "background": "#ffffff",
                "z-index": "3",
                "margin-bottom": f_height + f_space
            });
        }
    }

    jQuery(document).ready(function ($) {
        AmetexToggleMenuMobile();
        AmetexToggleSubMenu();
        AmetexFooterStick();

        var hT = $('.elementor-location-header').offset().top,
            hH = $('.elementor-location-header').outerHeight(),
            wS = $(window).scrollTop();

        if (wS > (hT + hH)) {
            $('.elementor-location-header').find('.she-header-yes').addClass('she-header');
        }

        /* Newsletter */
        $('.tnp-form').find('input').attr('placeholder', 'Enter your email');
    });

    /*=================================*/
    /* 24. Testimonial Slider
    /*=================================*/
    var BtTestimonialSliderHandler = function ($scope, $) {
        console.log('testimonial')
        let $testimonialSliderThumbs = $scope.find(".bt-testimonial-slider-thumbs-main").eq(0),
            $testimonialSliderThumbsContainer =
                $testimonialSliderThumbs.data("slider-thumbs-container") !== undefined
                    ? $testimonialSliderThumbs.data("slider-thumbs-container")
                    : false,
            $itemsThumbs =
                $testimonialSliderThumbs.data("items") !== undefined
                    ? $testimonialSliderThumbs.data("items")
                    : 3,
            $items_tablet_Thumbs =
                $testimonialSliderThumbs.data("items-tablet") !== undefined
                    ? $testimonialSliderThumbs.data("items-tablet")
                    : 3,
            $items_mobile_Thumbs =
                $testimonialSliderThumbs.data("items-mobile") !== undefined
                    ? $testimonialSliderThumbs.data("items-mobile")
                    : 3,
            $marginThumbs =
                $testimonialSliderThumbs.data("margin") !== undefined
                    ? $testimonialSliderThumbs.data("margin")
                    : 10,
            $margin_tabletThumbs =
                $testimonialSliderThumbs.data("margin-tablet") !== undefined
                    ? $testimonialSliderThumbs.data("margin-tablet")
                    : 10,
            $margin_mobileThumbs =
                $testimonialSliderThumbs.data("margin-mobile") !== undefined
                    ? $testimonialSliderThumbs.data("margin-mobile")
                    : 10,
            $effectThumbs =
                $testimonialSliderThumbs.data("effect") !== undefined
                    ? $testimonialSliderThumbs.data("effect")
                    : "slide",
            $speedThumbs =
                $testimonialSliderThumbs.data("speed") !== undefined
                    ? $testimonialSliderThumbs.data("speed")
                    : 400,
            $autoplayThumbs =
                $testimonialSliderThumbs.data("autoplay_speed") !== undefined
                    ? $testimonialSliderThumbs.data("autoplay_speed")
                    : 999999,
            // $loopThumbs =
            //     $testimonialSliderThumbs.data("loop") !== undefined
            //         ? $testimonialSliderThumbs.data("loop")
            //         : 0,
            $loopedSlidesThumbs =
                $testimonialSliderThumbs.data("looped-slides") !== undefined
                    ? $testimonialSliderThumbs.data("looped-slides")
                    : 1,
            $testimonialSliderThumbsOptions = {
                direction: "horizontal",
                speed: $speedThumbs,
                effect: $effectThumbs,
                // centeredSlides: $centeredSlidesThumbs,
                slidesPerView: $itemsThumbs,
                spaceBetween: $marginThumbs,
                // grabCursor: $grab_cursorThumbs,
                // autoHeight: true,
                loop: true,
                autoplay: {
                    delay: $autoplayThumbs
                },
                breakpoints: {
                    // when window width is <= 480px
                    480: {
                        slidesPerView: $items_mobile_Thumbs,
                        spaceBetween: $margin_mobileThumbs
                    },
                    // when window width is <= 640px
                    768: {
                        slidesPerView: $items_tablet_Thumbs,
                        spaceBetween: $margin_tabletThumbs
                    }
                },
                loopedSlides: $loopedSlidesThumbs, //looped slides should be the same
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                freeMode: true,
            };

        let $testimonialSlider = $scope.find(".bt-testimonial-slider-main").eq(0),
            $pagination =
                $testimonialSlider.data("pagination") !== undefined
                    ? $testimonialSlider.data("pagination")
                    : ".swiper-pagination",
            $arrow_next =
                $testimonialSlider.data("arrow-next") !== undefined
                    ? $testimonialSlider.data("arrow-next")
                    : ".swiper-button-next",
            $arrow_prev =
                $testimonialSlider.data("arrow-prev") !== undefined
                    ? $testimonialSlider.data("arrow-prev")
                    : ".swiper-button-prev",
            $items =
                $testimonialSlider.data("items") !== undefined
                    ? $testimonialSlider.data("items")
                    : 3,
            $items_tablet =
                $testimonialSlider.data("items-tablet") !== undefined
                    ? $testimonialSlider.data("items-tablet")
                    : 3,
            $items_mobile =
                $testimonialSlider.data("items-mobile") !== undefined
                    ? $testimonialSlider.data("items-mobile")
                    : 3,
            $margin =
                $testimonialSlider.data("margin") !== undefined
                    ? $testimonialSlider.data("margin")
                    : 10,
            $margin_tablet =
                $testimonialSlider.data("margin-tablet") !== undefined
                    ? $testimonialSlider.data("margin-tablet")
                    : 10,
            $margin_mobile =
                $testimonialSlider.data("margin-mobile") !== undefined
                    ? $testimonialSlider.data("margin-mobile")
                    : 10,
            $effect =
                $testimonialSlider.data("effect") !== undefined
                    ? $testimonialSlider.data("effect")
                    : "slide",
            $speed =
                $testimonialSlider.data("speed") !== undefined
                    ? $testimonialSlider.data("speed")
                    : 400,
            $autoplay =
                $testimonialSlider.data("autoplay_speed") !== undefined
                    ? $testimonialSlider.data("autoplay_speed")
                    : 999999,
            $loop =
                $testimonialSlider.data("loop") !== undefined
                    ? $testimonialSlider.data("loop")
                    : 0,
            $grab_cursor =
                $testimonialSlider.data("grab-cursor") !== undefined
                    ? $testimonialSlider.data("grab-cursor")
                    : 0,
            $centeredSlides = $effect == "coverflow" ? true : false,
            $pause_on_hover =
                $testimonialSlider.data("pause-on-hover") !== undefined
                    ? $testimonialSlider.data("pause-on-hover")
                    : "",
            $loopedSlides = $testimonialSlider.data("looped-slides") !== undefined
                ? $testimonialSlider.data("looped-slides")
                : 1,
            $thumbs = ($testimonialSlider.data("slider-thumbs-container") !== undefined &&
                ($testimonialSlider.data("slider-thumbs-container")) &&
                $testimonialSlider.data("slider-thumbs-container") === $testimonialSliderThumbsContainer)
                ? new Swiper(
                    $testimonialSliderThumbs,
                    $testimonialSliderThumbsOptions
                )
                : false,
            $testimonialSliderOptions = {
                direction: "horizontal",
                speed: $speed,
                effect: $effect,
                centeredSlides: $centeredSlides,
                slidesPerView: $items,
                spaceBetween: $margin,
                grabCursor: $grab_cursor,
                autoHeight: true,
                loop: $loop,
                loopedSlides: $loopedSlides,
                autoplay: {
                    delay: $autoplay
                },
                pagination: {
                    el: $pagination,
                    clickable: true
                },
                navigation: {
                    nextEl: $arrow_next,
                    prevEl: $arrow_prev
                },
                thumbs: {
                    swiper: $thumbs,
                },
                breakpoints: {
                    // when window width is <= 480px
                    480: {
                        slidesPerView: $items_mobile,
                        spaceBetween: $margin_mobile
                    },
                    // when window width is <= 640px
                    768: {
                        slidesPerView: $items_tablet,
                        spaceBetween: $margin_tablet
                    }
                }
            };

        var $testimonialSliderObj = new Swiper(
            $testimonialSlider,
            $testimonialSliderOptions
        );
        if ($autoplay === 0) {
            $testimonialSliderObj.autoplay.stop();
        }

        if ($pause_on_hover && $autoplay !== 0) {
            $testimonialSlider.on("mouseenter", function () {
                $testimonialSliderObj.autoplay.stop();
            });
            $testimonialSlider.on("mouseleave", function () {
                $testimonialSliderObj.autoplay.start();
            });
        }
    };

    jQuery(window).on("elementor/frontend/init", function () {
        console.log('testimonial init')
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/bt-testimonial-slider.default",
            BtTestimonialSliderHandler
        );
    });

})(jQuery);
