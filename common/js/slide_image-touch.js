
// Set individual slide timeout for dynamic autoplay
var setSwiperSlideTimeout = function ( swiper ) {
    var timeout = $( swiper.slides[ swiper.activeIndex ] ).data( "timeout" );

    if (timeout === undefined || timeout === "" || timeout === 0) {
        timeout =2000;
    }

    swiper.params.autoplay = timeout;
    swiper.update();
    swiper.startAutoplay();
};

var mySwiper = new Swiper ('.swiper-container', 
  {
    speed:2000,
    direction: 'horizontal',
    navigation: 
    {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: 
    {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
    zoom: false,
    keyboard: 
    {
      enabled: true,
      onlyInViewport: false,
    },
    mousewheel: 
    {
      invert: true,
    },
    autoplay:  
    {
      delay: 4000,
    },
    // effect: "fade",
    autoplayDisableOnInteraction: false,
    loop: true,
    
  }); 
// if()

var interval;
var timer = function () {
        interval = setInterval(function () {
            // $("#next").click();
            mySwiper[0].autoplay.start();
        }, 6000);
    };
    timer();
var timer1 = function () {
        setInterval(function () {
            // $("#next").click();
            mySwiper[1].autoplay.start();
        }, 7000);
    };
    timer1();


