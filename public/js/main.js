(function ($) {
    ('use strict');

    new WOW().init();

    /*---background image---*/
    function dataBackgroundImage() {
        $('[data-bgimg]').each(function () {
            var bgImgUrl = $(this).data('bgimg');
            $(this).css({
                'background-image': 'url(' + bgImgUrl + ')', // + meaning concat
            });
        });
    }

    $(window).on('load', function () {
        dataBackgroundImage();
    });

    /*---stickey menu---*/
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop(),
            screensize = $(window).width();
        if (screensize >= 480) {
            if (scroll < 100) {
                $('.sticky-header').removeClass('sticky');
            } else {
                $('.sticky-header').addClass('sticky');
            }
        }
    });

    // Slick Slider Activation
    var $sliderActvation = $('.slick__activation');
    if ($sliderActvation.length > 0) {
        $sliderActvation.slick({
            prevArrow:
                '<button class="prev_arrow"><i class="ion-arrow-left-c"></i></button>',
            nextArrow:
                '<button class="next_arrow"><i class="ion-arrow-right-c"></i></button>',
        });
    }

    // Slick Slider Activation
    $('.product_gallery_main_img').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 1,
        arrows: false,
        vertical: true,
        asNavFor: '.product_gallery_btn_img',
    });

    // Slick Slider2 Activation
    $('.product_gallery_btn_img').slick({
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 5,
        arrows: true,
        focusOnSelect: true,
        vertical: true,
        asNavFor: '.product_gallery_main_img',
        prevArrow:
            '<button class="prev_arrow"><span class="ti-angle-left"></span> </button>',
        nextArrow:
            '<button class="next_arrow"><span class="ti-angle-right"></span></button>',
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 4,
                    vertical: false,
                    dots: true,
                    arrows: false,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                },
            },
        ],
    });

    function imgzoom() {
        $('.gallery_img_list').each(function () {
            var $this = $(this),
                $image = $this.data('image');
            $this.zoom({
                url: $image,
            });
        });
    }

    if ($(window).width() > 767) {
        imgzoom();
    }

    /*---product navactive activation---*/
    var $productNavactive = $('.product_navactive');
    if ($productNavactive.length > 0) {
        $('.product_navactive').owlCarousel({
            loop: false,
            nav: true,
            autoplay: false,
            autoplayTimeout: 8000,
            items: 4,
            dots: false,
            mouseDrag: false,
            navText: [
                '<i class="ion-chevron-left"></i>',
                '<i class="ion-chevron-right"></i>',
            ],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                250: {
                    items: 2,
                },
                480: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
            },
        });
    }

    $('.modal').on('shown.bs.modal', function (e) {
        $('.product_navactive').resize();
    });

    $('.product_navactive a').on('click', function (e) {
        e.preventDefault();

        var $href = $(this).attr('href');

        $('.product_navactive a').removeClass('active');
        $(this).addClass('active');

        $('.product-details-large .tab-pane').removeClass('active show');
        $('.product-details-large ' + $href).addClass('active show');
    });

    //Quantity Counter
    $('.pro-qty').append('<a href="#" class="inc qty-btn">+</a>');
    $('.pro-qty').prepend('<a href="#" class= "dec qty-btn">-</a>');

    $('.qty-btn').on('click', function (e) {
        e.preventDefault();
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    //Shopping Cart addClass removeClass
    $('.shopping_cart > a').on('click', function () {
        $('.mini_cart,.body_overlay').addClass('active');
    });
    $('.mini_cart_close a,.body_overlay').on('click', function () {
        $('.mini_cart,.body_overlay').removeClass('active');
    });

    //Search Box addClass removeClass
    $('.header_search > a').on('click', function () {
        $('.page_search_box').addClass('active');
    });
    $('.search_close > i').on('click', function () {
        $('.page_search_box').removeClass('active');
    });

    /*--- Magnific Popup Video---*/
    $('.video_popup').magnificPopup({
        type: 'iframe',
        removalDelay: 300,
        mainClass: 'mfp-fade',
    });

    $('.popup_img').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
        },
    });

    // tab Activation
    $('#nav-tab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Nice Select
    $('select,.select_option').niceSelect();

    /*---  ScrollUp Active ---*/
    $.scrollUp({
        scrollText: '<i class="ion-arrow-up-c"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade',
    });

    /*---canvas menu activation---*/
    $('.canvas_open').on('click', function () {
        $('.offcanvas_menu_wrapper,.body_overlay').addClass('active');
    });

    $('.canvas_close,.body_overlay').on('click', function () {
        $('.offcanvas_menu_wrapper,.body_overlay').removeClass('active');
    });

    /*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu
        .parent()
        .prepend(
            '<span class="menu-expand"><i class="fa fa-angle-down"></i></span>'
        );

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function (e) {
        var $this = $(this);
        if (
            $this
                .parent()
                .attr('class')
                .match(
                    /\b(menu-item-has-children|has-children|has-sub-menu)\b/
                ) &&
            ($this.attr('href') === '#' || $this.hasClass('menu-expand'))
        ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this
                    .closest('li')
                    .siblings('li')
                    .find('ul:visible')
                    .slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if (
            $this.is('a') ||
            $this.is('span') ||
            $this.attr('clas').match(/\b(menu-expand)\b/)
        ) {
            $this.parent().toggleClass('menu-open');
        } else if (
            $this.is('li') &&
            $this.attr('class').match(/\b('menu-item-has-children')\b/)
        ) {
            $this.toggleClass('menu-open');
        }
    });

    // Price Slider
    $('#slider-range').slider({
        range: true,
        min: 0,
        max: 500,
        values: [12, 400],
        slide: function (event, ui) {
            $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1]);
        },
    });
    $('#amount').val(
        '$' +
            $('#slider-range').slider('values', 0) +
            ' - $' +
            $('#slider-range').slider('values', 1)
    );

    /*---MailChimp---*/
    $('#mc-form').ajaxChimp({
        language: 'en',
        callback: mailChimpResponse,
        // ADD YOUR MAILCHIMP URL BELOW HERE!
        url: 'https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef',
    });
    function mailChimpResponse(resp) {
        if (resp.result === 'success') {
            $('.mailchimp-success').addClass('active');
            $('.mailchimp-success')
                .html('' + resp.msg)
                .fadeIn(900);
            $('.mailchimp-error').fadeOut(400);
        } else if (resp.result === 'error') {
            $('.mailchimp-error')
                .html('' + resp.msg)
                .fadeIn(900);
        }
    }
    /*----------------------------------------*/
    /*  HasSub Item
/*----------------------------------------*/
    $('.hassub-item li.hassub a, .frequently-item li.has-sub a').on(
        'click',
        function () {
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp();
            } else {
                element.addClass('open');
                element.children('ul').slideDown();
                element.siblings('li').children('ul').slideUp();
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp();
            }
        }
    );
    /*----------------------------------------*/
    /*  Countdown
/*----------------------------------------*/
    function makeTimer($endDate, $this, $format) {
        var today = new Date();
        var BigDay = new Date($endDate),
            msPerDay = 24 * 60 * 60 * 1000,
            timeLeft = BigDay.getTime() - today.getTime(),
            e_daysLeft = timeLeft / msPerDay,
            daysLeft = Math.floor(e_daysLeft),
            e_hrsLeft = (e_daysLeft - daysLeft) * 24,
            hrsLeft = Math.floor(e_hrsLeft),
            e_minsLeft = (e_hrsLeft - hrsLeft) * 60,
            minsLeft = Math.floor((e_hrsLeft - hrsLeft) * 60),
            e_secsLeft = (e_minsLeft - minsLeft) * 60,
            secsLeft = Math.floor((e_minsLeft - minsLeft) * 60);

        var yearsLeft = 0;
        var monthsLeft = 0;
        var weeksLeft = 0;

        if ($format != 'short') {
            if (daysLeft > 365) {
                yearsLeft = Math.floor(daysLeft / 365);
                daysLeft = daysLeft % 365;
            }

            if (daysLeft > 30) {
                monthsLeft = Math.floor(daysLeft / 30);
                daysLeft = daysLeft % 30;
            }
            if (daysLeft > 7) {
                weeksLeft = Math.floor(daysLeft / 7);
                daysLeft = daysLeft % 7;
            }
        }

        var yearsLeft = yearsLeft < 10 ? '0' + yearsLeft : yearsLeft,
            monthsLeft = monthsLeft < 10 ? '0' + monthsLeft : monthsLeft,
            weeksLeft = weeksLeft < 10 ? '0' + weeksLeft : weeksLeft,
            daysLeft = daysLeft < 10 ? '0' + daysLeft : daysLeft,
            hrsLeft = hrsLeft < 10 ? '0' + hrsLeft : hrsLeft,
            minsLeft = minsLeft < 10 ? '0' + minsLeft : minsLeft,
            secsLeft = secsLeft < 10 ? '0' + secsLeft : secsLeft,
            yearsText = yearsLeft > 1 ? 'years' : 'year',
            monthsText = monthsLeft > 1 ? 'months' : 'month',
            weeksText = weeksLeft > 1 ? 'weeks' : 'week',
            daysText = daysLeft > 1 ? 'days' : 'day',
            hourText = hrsLeft > 1 ? 'hrs' : 'hr',
            minsText = minsLeft > 1 ? 'mins' : 'min',
            secText = secsLeft > 1 ? 'secs' : 'sec';

        var $markup = {
            wrapper: $this.find('.countdown__item'),
            year: $this.find('.yearsLeft'),
            month: $this.find('.monthsLeft'),
            week: $this.find('.weeksLeft'),
            day: $this.find('.daysLeft'),
            hour: $this.find('.hoursLeft'),
            minute: $this.find('.minsLeft'),
            second: $this.find('.secsLeft'),
            yearTxt: $this.find('.yearsText'),
            monthTxt: $this.find('.monthsText'),
            weekTxt: $this.find('.weeksText'),
            dayTxt: $this.find('.daysText'),
            hourTxt: $this.find('.hoursText'),
            minTxt: $this.find('.minsText'),
            secTxt: $this.find('.secsText'),
        };

        var elNumber = $markup.wrapper.length;
        $this.addClass('item-' + elNumber);
        $($markup.year).html(yearsLeft);
        $($markup.yearTxt).html(yearsText);
        $($markup.month).html(monthsLeft);
        $($markup.monthTxt).html(monthsText);
        $($markup.week).html(weeksLeft);
        $($markup.weekTxt).html(weeksText);
        $($markup.day).html(daysLeft);
        $($markup.dayTxt).html(daysText);
        $($markup.hour).html(hrsLeft);
        $($markup.hourTxt).html(hourText);
        $($markup.minute).html(minsLeft);
        $($markup.minTxt).html(minsText);
        $($markup.second).html(secsLeft);
        $($markup.secTxt).html(secText);
    }

    $('.countdown').each(function () {
        var $this = $(this);
        var $endDate = $(this).data('countdown');
        var $format = $(this).data('format');
        setInterval(function () {
            makeTimer($endDate, $this, $format);
        }, 0);
    });
    /*----------------------------------------*/
    /* Toggle Function Active
	/*----------------------------------------*/
    // showlogin toggle
    $('#showlogin').on('click', function () {
        $('#checkout-login').slideToggle(900);
    });
    // showlogin toggle
    $('#showcoupon').on('click', function () {
        $('#checkout_coupon').slideToggle(900);
    });
    // showlogin toggle
    $('#cbox').on('click', function () {
        $('#cbox-info').slideToggle(900);
    });

    // showlogin toggle
    $('#ship-box').on('click', function () {
        $('#ship-box-info').slideToggle(1000);
    });
})(jQuery);
