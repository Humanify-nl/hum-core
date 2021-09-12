/**
 * Block variations
 *
 * @package hum-gutenberg
 */

wp.domReady(() => {

  wp.blocks.registerBlockVariation(
    'hum/entry-header', {
      name: 'entry-header-full',
      title: 'Post Header full',
      icon: 'portfolio',
      scope: ['block'],
      innerBlocks: [
        ['core/column'],
        ['core/column'],
        ['core/column'],
      ],
    }
  );

});
