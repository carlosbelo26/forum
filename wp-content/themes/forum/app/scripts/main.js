jQuery(document).ready(function ($) {

    // isMobile
    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (
                isMobile.Android() ||
                isMobile.BlackBerry() ||
                isMobile.iOS() ||
                isMobile.Opera() ||
                isMobile.Windows()
            );
        }
    };

    if (!isMobile.any()) {
        var position = $(window).scrollTop();

        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll <= 350) {
                $(".wpusb-fixed").addClass("wpusb-fixed-stick");
            } else {
                $(".wpusb-fixed").removeClass("wpusb-fixed-stick");
            }
        });
    }

    // preloader
    $(window).load(function () {
        $("#preloaderAll").fadeOut("slow", function () {
            $(this).remove();
        });
    });

    // menu
    $(function () {
        $(".btnav").click(function () {
            $(".navmobile").fadeToggle();
        });
        if (isMobile.any()) {
            $(".navmobile a").click(function () {
                $(".navmobile").fadeOut(300);
            });
        }
        $(".openFormSerach").click(function () {
            $("#searchform").toggleClass('searchformOpen');
            $("#header").toggleClass('hsearchformOpen');
        });
    });

    // scrollto
    jQuery(function ($) {
        $('a[href*="#"]:not([href="#"])').click(function (e) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);

                headerHeight = 30;

                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - headerHeight //offsets for fixed header
                    }, 'linear');

                }
            }
        });
    });

    $('.owlagendas').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 1
          }
      }
    });

    $('.owlmidia').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });

    // jQuery(document).ready(function ($) {

    //     var hash = window.location.hash

    //     if (hash == '' || hash == '#' || hash == undefined) return false;


    //     var target = $(hash);

    //     headerHeight = 100;

    //     target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

    //     if (target.length) {
    //         $('html,body').stop().animate({
    //             scrollTop: target.offset().top - headerHeight //offsets for fixed header
    //         }, 'linear');

    //     }

    // });

    // wow
    wow = new WOW({
        boxClass: "wow",
        animateClass: "animated",
        offset: 0,
        mobile: true,
        live: true
    });
    wow.init();

    // parallax
    $.stellar({
        horizontalScrolling: false,
        responsive: true
    });

});
