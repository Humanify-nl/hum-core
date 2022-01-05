<?php
/**
 * Collapsible list block
 *
 * ACF field: group_60212965217d1
 *
 * @package hum-core
 */


if ( have_rows( 'tab_repeater' ) ) {
?>

  <ul class="list-tabs">

    <?php
    $n = 1;
    while ( have_rows( 'tab_repeater' ) ) {

      the_row();

      // vars
      $tab_title = get_sub_field( 'tab_title' );
      $tab_text = get_sub_field( 'tab_text' );
      $tab_link = get_sub_field( 'tab_link' );
      $tab_link_title = get_sub_field( 'tab_link_title' );
      $link_title = $tab_link_title ?: 'Lees meer';

      // build html
      if ( $tab_title ) {

        ?>
        <li class="tab tab-<?php echo $n++; ?>">

          <div class="tab-frame tab-wrap">

            <h4 class="tab-title"><?php echo esc_html($tab_title); ?></h4>

            <div class="tab-card">

              <div class="tab-card-body">

                <div class="tab-text"><?php echo $tab_text; ?></div>

                <?php
                if ( $tab_link ) {
                  echo '<div class="tab-footer">';
                    echo '<a class="tab-link" href="'.esc_url($tab_link).'">';
                      echo esc_html($link_title);
                    echo '</a>';
                  echo '</div>';
                }
                ?>

              </div>

            </div>

          </div>

        </li>
        <?php
      }
    }
    ?>
  </ul>

<?php
}
