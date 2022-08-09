(function ($) {
  $(document).ready(function () {
    // Slick Slider
    $('.slider-single').slick({
      dots: true,
      arrows: true,
      infinite: true,
      // autoplay: true,
      // fade: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    });

    // Partner slider
    $('.hm-partner-slider').slick({
      dots: true,
      arrows: false,
      infinite: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
          }
        },

        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 476,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });

  }); // end ready document
})(jQuery)