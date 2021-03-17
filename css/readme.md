# CSS Documentation

**Note:** This theme doesn't support legacy browsers like Internet Explorer version 11 and below. The NC Framework makes heavy use of custom properties (variables), flexbox, and grid. The [BEM](http://getbem.com/introduction/) coding methodology is used with one underscore and dash instead of two.

## About the CSS

Some CSS files are for the front-end, or the block editor, and some files are used for both. Visit `functions/register-css-js.php` to see how the CSS files are loaded. 

With the introduction of the block editor in WordPress, what displays on the front-end should match what displays in the block editor (moderately). Therefore, the reason for multiple files.

The following files are **only** used in the block editor:

* `editor.css` formats spacing between blocks in the editor

The following files are **only** used on the front-end:

* `comments.css` styles the optional comments section 
* `root.css` resets and normalizes styles across browsers
* `menus.css` styles the complex drop-menus throughout the theme
* `theme.css` styles everything that doesn't display in the block editor (header, footer, etc.)

The following files are used on **both** the front-end and in the block editor:

* `uclasses.css` universal utility classes
* `blocks.css` styles for custom block modules like hero, gallery, and more
* `variables.css` sets the global custom properties for all CSS
* `content.css` styles any content that will display in the block editor and the front-end

***

## The best files to edit

This is not to say you won't want to copy other CSS files to make tweaks, but these are the main ones to copy and edit in your child theme:

* `variables.css`
* `theme.css`
* `content.css` 

### 1. Variables.css

This is the first file to update. This controls all the global custom properties throughout the theme. **Don't** delete any property but you can edit values and create new custom properties and values. Use your browser's inspector to preview changes live.

### 2. Theme.css

This is the second file to update. This file controls the theme's general design excluding any content that appear in the block editor. This file will include default styles responsible for layout. You can update the values or remove whole properties and write new ones. Use your browser's inspector to preview changes live.

### 3. Content.css

This is the last file to update. This file controls content that displays in the block editor and the front-end. You'll find typography and button styles here. **Don't** delete any property just edit and add new styles. Use your browser's inspector to preview changes live.

***

## Files you shouldn't need to edit

The following files are capable of being copied and edited to the child theme but shouldn't for lost of updates.

* `blocks.css`
* `comments.css`
* `menus.css`
* `root.css`
* `uclasses.css`
* `editor.css`

## Editing block modules

Just update the custom properties. When you use the browser's inspector you'll find many block modules that list all custom properties with default values like below:

```css
.nclogo {
  --logo-text-size: 1.3em;
  --logo-text-transform: uppercase;
  --logo-text-weight: bold;
  --logo-text-color: inherit;
  --logo-img-width: 250px;
  --logo-padding: 1.5em 0;
  --logo-margin: 0;
}
```


Say for instance,  you're using another `.nclogo` block in the `#megafooter` element, you would write new CSS like so and only update properties that matter:

```css
#megafooter .nclogo {
  --logo-text-size: 1.5em;
  --logo-padding: 1.75em 0;
}
```

## Performance

All these CSS files mean multiple `https` requests that could mean slowing down your site. To solve this issue, use a plugin like [Autoptimze](https://wordpress.org/plugins/autoptimize/) to combine and cache all your theme and plugin CSS into one file.