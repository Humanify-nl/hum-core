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

  // init Swiper
  const swiper = new Swiper('.swiper', {
    modules: [ Navigation, Pagination, Autoplay, EffectFade ],
    direction: 'horizontal',
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 5000,
    },
    speed: 600,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

} );
