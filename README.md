# Hum-core Gutenberg Theme

- Gutenberg ready (wp 5.8)
- Center, Wide & Full page-width
- Root CSS-variable system integrated with WP
- Adds some essential ACF blocks.
- Supports Yoast Faq (+ collapse), How-to & Breadcrumb blocks.
- NPM package with webpack to handle all assets & copy template files.

*Please note: This theme is built with Advanced Custom Fields Pro*


### Philosophy
One of the challenges of working with the Block editor as a freelancer or agency, is the amount of control the client has to change the design of the page.

Which is bad because:
- It creates cognitive overload & dissonance.
- Extra learning curve, blank page syndrome.
- Thinking about styling distracts from writing content.

A website user is not (and should never be) a designer, ux-er, or developer in professional contexts. Unless they specifically ask for it.

Yet, they should definitely be in complete control over their website *content*, within the boundaries of the design. That is the challenge.


## Block editor

- Color picker is auto-populated from Sass variable map.
- Background-colors dictate foreground colors. Text-color picker is disabled (for most blocks).
- Disabled: Gradient, Custom color, Contrast checker, Custom spacing, Link color, Line-height.
- Added system for allowed blocks per template/post-type.
- Block patterns can be saved by copying from the editor in a template file (using get_template_part in OB).
- Exposes reusable blocks as 'Saved Blocks' in admin menu.


#### ACF blocks
- Tabs block
- Slider block (with swiper.js)
- SVG block (icon / shape)
- Pages block (customizable previews for children / custom parent)
- Post-query block (customizable previews for each post type)


#### Page-width
- Three widths to control block max-widths. Customizable with Sass variable map. This affect only direct children of the main block list.
- Inner-content will adhere to page-width (a fullwidth cover block's inner content will adhere to page-width).
- Page width can be set with a hook in template files, or on a per-page basis with a baked in ACF field.


#### Vertical spacing
- All blocks are vertically spaced by a global variable (default 2rem).
- A spacer block (S / M / L) is used for flexible (but theme-controlled) spacing to create sections.
- Groups received a block-style to quickly add extra vertical space (and become a 'section').


#### Variables
- The theme is customized with several sass variable maps (spacing, colors, fonts, etc.)
- Breakpoints are in line with WP block library, but fully customizable into Bootstrap bp's for example.
- The vars are compiled in the root, not unlike the current WP variable system (& naming).
- The vars are accessible with the usual css: ```color: 'var(--color--primary)';```.
- For mixins and other internal use, a sass function ```color: v(primary, light);``` is used.


#### Pages & Posts
- Related posts & pages are default added to pages & posts that have siblings.
- Archives are shown in a grid with a couple preview types (preview = post-summary, image, title, excerpt, link).
- Grids and previews can be customized with global options (acf options fields).
- Custom post types can be added with minimal effort, and will show Archive & Singles out of the box.


#### Supported plug-ins
- Advanced Custom Fields Pro
- Yoast SEO
- AMP
- JVM rich text icons (optional)
- Forminator (optional)


## How to use
```
$npm run build   // dev code
$npm run watch   // dev code with watch mode
$npm run dev     // dev code with watch mode & browsersync
$npm run prod    // production code with source maps
```
