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
                  align: ['wide', 'full'],
              } ),
          } );
      }
      return settings;
  }
);


// remove text color for some blocks

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'hum/colors',
  function( settings, name ) {

    if ( name == 'core/button' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          __experimentalBorder: false,
          color: { "background": true, "text": false },
        } ),
      } );
    }

    if ( name == 'core/heading' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          color: { "background": false, "text": true },
          typography: false,
        } ),
      } );
    }

    if ( name == 'core/list' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          color: { "background": true, "text": false },
        } ),
      } );
    }

    if ( name == 'core/group' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          color: { "background": true, "text": false },
        } ),
      } );
    }

    if ( name == 'core/columns' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          color: { "background": true, "text": false },
        } ),
      } );
    }

    if ( name == 'core/column' ) {

      return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
          color: { "background": true, "text": false },
        } ),
      } );
    }

    return settings;
  }
);
