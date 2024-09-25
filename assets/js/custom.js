jQuery(function ($) {

  /* -----------------------------------------
  Preloader
  ----------------------------------------- */
  $("#preloader").delay(1000).fadeOut();
  $("#loader").delay(1000).fadeOut("slow");

  /* -----------------------------------------
  rtl
  ----------------------------------------- */
  var isRTL = $("html").attr("dir") === "rtl";

  /* -----------------------------------------
  Marquee Ticker
  ----------------------------------------- */
  function configureMarqueeDirection() {
    const isRtl = $("body").hasClass("rtl");
    const direction = isRtl ? "right" : "left";

    $(".marquee").marquee({
      speed: 30,
      duration: 1000,
      gap: 0,
      delayBeforeStart: 0,
      direction: direction,
      duplicated: true,
      pauseOnHover: true,
      startVisible: true,
      easing: "linear",
    });
  }
  // Call the function to configure the marquee direction
  configureMarqueeDirection();

  /* -----------------------------------------
  Widget Vertical Carousel
  ----------------------------------------- */
  $(".trending-post-carousel").slick({
    dots: false,
    vertical: true,
    speed: 1000,
    autoplay: 100,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    infinite: true,
    verticalSwiping: true,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        verticalSwiping: false,
      },
    },
    ],
  });

  /* -----------------------------------------
  Toggle Button
  ----------------------------------------- */
  $(".menu-toggle").click(function () {
    $(this).toggleClass("show");
  });

  /* -----------------------------------------
  Keyboard Navigation
  ----------------------------------------- */
  $(window).on("load resize", function () {
    if ($(window).width() < 992) {
      $(".main-navigation")
      .find("li")
      .last()
      .bind("keydown", function (e) {
        if (e.which === 9) {
          e.preventDefault();
          $("#masthead").find(".menu-toggle").focus();
        }
      });
    } else {
      $(".main-navigation").find("li").unbind("keydown");
    }
  });

  var primary_menu_toggle = $("#masthead .menu-toggle");
  primary_menu_toggle.on("keydown", function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if (primary_menu_toggle.hasClass("show")) {
      if (shiftKey && tabKey) {
        e.preventDefault();
        $(".main-navigation").toggleClass("toggled");
        primary_menu_toggle.removeClass("show");
      }
    }
  });

  function applySearchFunctionality() {
    if (window.innerWidth <= 768) {
      $(".header-search-wrap")
      .find(".search-submit")
        .off("keydown")  // Clear any previous bindings to avoid duplicate bindings
        .on("keydown", function (e) {
          var tabKey = e.keyCode === 9;
          if (tabKey) {
            e.preventDefault();
            $(".search-icon").focus();
          }
        });
        
        $(".search-icon").off("keydown").on("keydown", function (e) {
          var tabKey = e.keyCode === 9;
          var shiftKey = e.shiftKey;
          if ($(".header-search-wrap").hasClass("show")) {
            if (shiftKey && tabKey) {
              e.preventDefault();
              $(".header-search-wrap").removeClass("show");
              $(".search-icon").focus();
            }
          }
        });
      } else {
      // Remove the event bindings if the viewport is greater than 768px
      $(".header-search-wrap").find(".search-submit").off("keydown");
      $(".search-icon").off("keydown");
    }
  }
  
  // Apply functionality on page load
  applySearchFunctionality();
  
  // Reapply functionality on window resize
  $(window).resize(function () {
    applySearchFunctionality();
  });

  /* -----------------------------------------
  Header Search Bar 
  ----------------------------------------- */
  var searchWrap = $(".header-search-wrap");
  $(".search-icon").click(function (e) {
    e.preventDefault();
    searchWrap.toggleClass("show");
    searchWrap.find("input.search-field").focus();
  });
  $(document).click(function (e) {
    if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
      $(".header-search-wrap").removeClass("show");
    }
  });

  /* -----------------------------------------
  Scroll To Top
  ----------------------------------------- */
  var infinite_news_scroll_btn = $(".scroll-to-top");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      infinite_news_scroll_btn.addClass("show");
    } else {
      infinite_news_scroll_btn.removeClass("show");
    }
  });

  infinite_news_scroll_btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
    {
      scrollTop: 0,
    },
    "300"
    );
  });

});
