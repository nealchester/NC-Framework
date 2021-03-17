# CSS Documentation

**Note:** This theme uses modern CSS including custom properties (CSS variables), flexbox, and grid. This theme only supports modern browsers (Internet Explorer 11 and below are not supported).

## About the CSS

Some CSS files are for the front-end, or the block editor, and some files are used for both. Visit `functions/register-css-js.php` to see how the CSS files are loaded. 

With the introduction of the block editor in WordPress, what displays on the front-end should match what displays in the block editor (moderately). Therefore, the reason for multiple files.

The following files are **only** used in the block editor:

* `editor.css` formats spacing between blocks in the editor (no need to edit)

The following files are **only** used on the front-end:

* `comments.css` styles the optional comments section 
* `root.css` resets and normalizes styles across browsers
* `menus.css` styles the complex drop-menus throughout the theme
* `theme.css` styles everything that doesn't display in the block editor (header, footer, etc.). 

The following files are used on **both** the front-end and in the block editor:

* `uclasses.css` universal utility classes
* `blocks.css` styles for custom block modules like hero, gallery, and more
* `variables.css` sets the global custom properties for all CSS
* `content.css` styles any content that will display in the block editor and the front-end

***

## The only files you'll need to work with:

This is not to say you won't want to copy other CSS files to make tweaks but these are the main ones to copy and edit within your child theme:

* `variables.css` 
* `theme.css` 
* `content.css` 

### 1. Variables.css

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

### 2. Theme.css

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

### 3. Content.css

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

***

## SASS (SCSS)

For organization purposes, the `blocks` folder includes styles for blocks (or modules) that later compile to make the `blocks.css`.

## Performance

All these CSS files equal additional `https` requests. To solve this issue, use a plugin like [Autoptimze](https://wordpress.org/plugins/autoptimize/) to combine all your theme and plugin CSS into one file.