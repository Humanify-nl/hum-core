/**
 * Add toggle class for tabs
 *
 * @package hum-v7-core
 */

(function($){

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function() {

        // activate first tab & toggled title
        $(".tab:first .tab-card").addClass("is-active");
        $(".tab:first .tab-title").addClass("is-toggled");
        var tabHeight = $(".tab:first .tab-title").outerHeight();

        // find height and add it
        var firstHeight = $(".tab:first .tab-card-body").outerHeight() + tabHeight + "px";
        $(".list-tabs").css("height",firstHeight);

        // toggle is-active when toggled
        $(".tab-wrap").click(function() {

          const shouldExpand = !$(this).hasClass("is-toggled");


          $(".is-toggled").toggleClass("is-toggled");
          $(".is-active").toggleClass("is-active");

          if (shouldExpand) {

            $(this).children(".tab-card").toggleClass("is-active");
            $(this).find(".tab-title").toggleClass("is-toggled");

          }

          
          var contentHeight = $(this).find(".tab-card-body").outerHeight();
          console.log(contentHeight);
          if ( contentHeight < 80 ) {
            var currentHeight = 80 + tabHeight + "px";
          } else {
            var currentHeight = contentHeight + tabHeight + "px";
          }
          // adjust height
          $(".list-tabs").css("height",currentHeight);

        });
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.block-tabs').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=tabs', initializeBlock );
    }

})(jQuery);
