<?php
/**
 * Setup admin
 *
 * @package hum-core
 */

/**
 * Load admin stylesheet
 *
 */
/*
if ( ! function_exists('hum_admin_style') ) {

 	function hum_admin_style() {

 		wp_enqueue_style('hum_admin-style',
 		get_stylesheet_directory_uri() .'/assets/css/admin.css', false, '1.0', 'all' );
 	}

 	add_action('admin_print_styles', 'hum_admin_style');
}
*/


/**
 * Load admin fontawesome stylesheet in admin
 *
 */
/*
if ( ! function_exists('hum_admin_fa') ) {

	function hum_admin_fa() {
		wp_enqueue_style( 'font-awesome',
		get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.css',
		array(),
		'4.7.0',
		'all' );
	}
	add_action('admin_print_styles', 'hum_admin_fa');

}
*/


/**
 * Custom function to change default template name in menu
 *
 */

add_filter('default_page_template_title', function() {

  return __('Default', 'hum-core');

});


/**
 * Reusable Blocks accessible in backend
 * @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area
 *
 */
function hum_saved_blocks_admin_menu() {

    add_menu_page(
      'Saved blocks',
      'Saved blocks',
      'edit_posts',
      'edit.php?post_type=wp_block',
      '',
      'dashicons-screenoptions',
      20
    );
}
add_action( 'admin_menu', 'hum_saved_blocks_admin_menu' );


/**
 * Page order
 *
 */
function hum_change_menu_order( $menu_order ) {

    return array(
        'index.php', // order 2
        'edit.php?post_type=page',
        'edit.php', // order 5
        'edit.php?post_type=projects',
        'edit.php?post_type=products',
        'edit.php?post_type=services',
        'edit.php?post_type=reviews',
        'edit.php?post_type=portfolio',
        'edit.php?post_type=employees',
        'edit.php?post_type=clients',
        'edit.php?post_type=jobs',
        'edit.php?post_type=testimonial',
        'edit.php?post_type=logos',
        'upload.php', // order 10,
        'edit.php?post_type=wp_block',
    );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'hum_change_menu_order' );


/**
 * Move excerpt to top of editor
 *
 * @link https://wpartisan.me/tutorials/wordpress-how-to-move-the-excerpt-meta-box-above-the-editor
 * Remove the regular excerpt box and add it above the wysiwyg editor
 *
 * @return null
 */
function hum_remove_normal_excerpt() {

    remove_meta_box( 'postexcerpt' , 'post' , 'normal' );

}
add_action( 'admin_menu' , 'hum_remove_normal_excerpt' );


/**
 * Add the excerpt meta box back in with a custom screen location
 *
 * @param string $post_type
 * @return null
 */
function hum_add_excerpt_meta_box( $post_type ) {

    if ( in_array( $post_type, array( 'post', 'page' ) ) ) {

        add_meta_box(
            'hum_postexcerpt',
            __( 'Snippet', 'hum_core' ),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'hum_add_excerpt_meta_box' );

/**
 * You can't actually add meta boxes after the title by default in WP
 * We registered our own meta box position `after_title` onto which we've regiestered our new meta boxes
 * Now calling them in the `edit_form_after_title` hook which is run after the post title box is displayed.
 *
 * @return null
 */
function hum_run_after_title_meta_boxes() {

    global $post, $wp_meta_boxes;
    # Output the `below_title` meta boxes:
    do_meta_boxes( get_current_screen(), 'after_title', $post );

}

add_action( 'edit_form_after_title', 'hum_run_after_title_meta_boxes' );



/**
 * Modify TinyMCE editor to remove H1.
 *
 */
function hum_tiny_mce_remove_unused_formats($init) {

	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
	return $init;
}
add_filter('tiny_mce_before_init', 'hum_tiny_mce_remove_unused_formats' );


/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */

function hum_custom_tinymce( $buttons ) {

    $remove_buttons = array(
        //'bold',
        //'italic',
        //'strikethrough',
        //'bullist',
        //'numlist',
        //'blockquote',
        //'hr', // horizontal line
        'alignleft',
        'aligncenter',
        'alignright',
        //'link',
        //'unlink',
        //'wp_more', // read more link
        //'spellchecker',
        //'dfw', // distraction free writing mode
        'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
add_filter( 'mce_buttons', 'hum_custom_tinymce');


/**
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
function hum_custom_tinymce_kitchen_sink( $buttons ) {

    $remove_buttons = array(
        //'formatselect', // format dropdown menu for <p>, headings, etc
        'underline',
        'alignjustify',
        'forecolor', // text color
        //'pastetext', // paste as text
        //'removeformat', // clear formatting
        //'charmap', // special characters
        'outdent',
        'indent',
        //'undo',
        //'redo',
        //'wp_help', // keyboard shortcuts
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
add_filter( 'mce_buttons_2', 'hum_custom_tinymce_kitchen_sink');
