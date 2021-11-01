/**
 * Collapse toggle class
 *
 * @package hum-core
 */

jQuery(document).ready(function($) {

  $(".collapse__item").click(function() {

    const shouldExpand = !$(this).hasClass("toggled");

    var contentHeight = $(this).find(".block__text").outerHeight();
    var heightPixels = contentHeight + "px";

    // 80 is minimum height set in CSS .block--collapser.scss
    if ( contentHeight < 80 ) {
      var height = 80;
    } else {
      var height = heightPixels;
    }

    $(".toggled").toggleClass("toggled");

    if (shouldExpand) {

      $(this).children(".collapse__body").toggleClass("toggled");
      $(this).toggleClass("toggled");
      // add height when expanded
      $(this).children(".collapse__body").css("height", height);
      // remove height from other cards that are open
      $(".collapse__item").not(this).children(".collapse__body").css("height", "0");

    } else {

      // remove height for cards that aren't clicked
      $(this).children(".collapse__body").css("height", "0");

    }

  });
});
