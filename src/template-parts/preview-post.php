<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */

// get post type option field or fallback
$preview_type = get_field( 'preview_type_posts', 'option' ) ?: 'preview';

get_template_part( 'template-parts/preview-types/'.$preview_type );
