/**
 * Swiper init
 *
 * @package hum-core
 */


// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination, Autoplay, EffectFade } from 'swiper';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';
//import 'swiper/css/effect-flip';


// import Swiper bundle with all modules installed
//import Swiper from 'swiper/bundle';

// import styles bundle
//import 'swiper/css/bundle';

jQuery(document).ready(function($) {

  const swiperPost = new Swiper('.swiper-post', {
    modules: [ Navigation, Pagination, Autoplay ],
    direction: 'horizontal',
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 5000,
    },
    speed: 400,
    pagination: {
      el: '.swiper-post-pagination',
      type: 'bullets',
    },
    navigation: {
      nextEl: '.swiper-post-button-next',
      prevEl: '.swiper-post-button-prev',
    },
    breakpoints: {
      // when window width is >= 320
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      // when window width is >= 768
      768: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      // when window width is >= 992
      960: {
        slidesPerView: 2,
        spaceBetween: 32
      }
    }
  });

} );
