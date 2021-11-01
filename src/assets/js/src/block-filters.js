/**
 * Block filters
 *
 * @package hum-core
 */

// change alignment options for pullquote

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'core/pullquote',
  function( settings, name ) {
      if ( name === 'core/pullquote' ) {
          return lodash.assign( {}, settings, {
              supports: lodash.assign( {}, settings.supports, {
                  // disable the align-UI completely ...
                  // align: false,
                  // ... or only allow specific alignments
                  align: ['wide', 'full'],
              } ),
          } );
      }
      return settings;
  }
);
