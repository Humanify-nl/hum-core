/**
 * Blocks removed
 *
 * @package hum-core
 */

wp.domReady(() => {

  // block types
  //wp.blocks.unregisterBlockType( 'core/verse' );
  wp.blocks.unregisterBlockType( 'core/freeform' ); // classic editor
  wp.blocks.unregisterBlockType( 'core/audio' );
  wp.blocks.unregisterBlockType( 'core/verse' );
  wp.blocks.unregisterBlockType( 'core/loginout' );
  wp.blocks.unregisterBlockType( 'core/query' );
  wp.blocks.unregisterBlockType( 'core/archives' );

  // embed variations
  wp.blocks.unregisterBlockVariation('core/embed', 'amazon-kindle');
  wp.blocks.unregisterBlockVariation('core/embed', 'animoto');
  wp.blocks.unregisterBlockVariation('core/embed', 'cloudup');
  wp.blocks.unregisterBlockVariation('core/embed', 'crowdsignal');
  wp.blocks.unregisterBlockVariation('core/embed', 'dailymotion');
  wp.blocks.unregisterBlockVariation('core/embed', 'flickr');
  wp.blocks.unregisterBlockVariation('core/embed', 'imgur');
  wp.blocks.unregisterBlockVariation('core/embed', 'issuu');
  wp.blocks.unregisterBlockVariation('core/embed', 'reddit');
  wp.blocks.unregisterBlockVariation('core/embed', 'kickstarter');
  wp.blocks.unregisterBlockVariation('core/embed', 'mixcloud');
  wp.blocks.unregisterBlockVariation('core/embed', 'reverbnation');
  wp.blocks.unregisterBlockVariation('core/embed', 'meetup-com');
  wp.blocks.unregisterBlockVariation('core/embed', 'screencast');
  wp.blocks.unregisterBlockVariation('core/embed', 'scribd');
  wp.blocks.unregisterBlockVariation('core/embed', 'slideshare');
  wp.blocks.unregisterBlockVariation('core/embed', 'smugmug');
  //wp.blocks.unregisterBlockVariation('core/embed', 'soundcloud');
  wp.blocks.unregisterBlockVariation('core/embed', 'speaker-deck');
  //wp.blocks.unregisterBlockVariation('core/embed', 'spotify');
  //wp.blocks.unregisterBlockVariation('core/embed', 'tiktok');
  wp.blocks.unregisterBlockVariation('core/embed', 'ted');
  //wp.blocks.unregisterBlockVariation('core/embed', 'twitter');
  wp.blocks.unregisterBlockVariation('core/embed', 'tumblr');
  //wp.blocks.unregisterBlockVariation('core/embed', 'youtube');
  //wp.blocks.unregisterBlockVariation('core/embed', 'vimeo');
  wp.blocks.unregisterBlockVariation('core/embed', 'videopress');
  //wp.blocks.unregisterBlockVariation('core/embed', 'wordpress');
  wp.blocks.unregisterBlockVariation('core/embed', 'wordpress-tv');

  // block styles
  wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
  //wp.blocks.unregisterBlockStyle( 'core/pullquote', 'solid-color' );
  //wp.blocks.unregisterBlockStyle( 'core/pullquote', 'default' );

});
