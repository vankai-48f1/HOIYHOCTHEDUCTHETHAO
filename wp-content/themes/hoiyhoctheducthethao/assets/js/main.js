(function ($) {
  // Insert icon dropdown to sub menu
  $(".header-nav__menu-primary .menu-item.menu-item-has-children > a").append("<span class=\"action-drop-submenu\"><i class=\"fas fa-angle-down\"></i></span>")
  // Open sub menu
  $(".header-nav__menu-primary .menu-item.menu-item-has-children > a").on("click", function (e) {
    e.stopPropagation();
  })

  // function event dropdow menu
  function actionDropdowMenu(windowWidth) {
    if (windowWidth < 576) {
      $(".header-nav__menu-primary .menu-item.menu-item-has-children a .action-drop-submenu").on("click", function (e) {
        e.stopPropagation()
        $(this).closest(".menu-item").find(".sub-menu").toggleClass("drop-active")
        return false;
      })
    }
  }
  if ($(window).width() < 576) {
    actionDropdowMenu($(window).width())
  }
  $(window).resize(function () {
    actionDropdowMenu($(window).width())
  })

  // back to top
  const backtotop = $("#backtotop-btn");

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 1000) {
      backtotop.addClass("show");
    } else {
      backtotop.removeClass("show");
    }
  });
  backtotop.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      "1000",
      "linear"
    );
  });

  // open menu
  $('.hd-hamburger-btn').on('click', function () {
    $('.body-backdrop').addClass('backdrop-open');
    $('.hd-fixed-right').addClass('show-menu');
  });
  // close menu
  $('.hd-fixed-right__close').on('click', function () {
    $('.body-backdrop').removeClass('backdrop-open')
    $('.hd-fixed-right').removeClass('show-menu');
  });

})(jQuery)