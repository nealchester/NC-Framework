# CSS Documentation

**Note:** The NC Framework supports modern browsers. Browsers like Internet Explorer 11 and earlier are not supported. With modern browsers comes modern CSS. This theme makes heavy use of custom properties (variables), flexbox, and grid. The [BEM](http://getbem.com/introduction/) coding methodology is used with one underscore and dash instead of two.

***

## The CSS files

Some CSS files are for the front-end or the block editor, and some files are used for both. With the introduction of the block editor in WordPress, what displays on the front-end should match what displays in the block editor (moderately). Therefore, the reason for multiple files.

The following files are **only** used in the block editor:

* **`editor.css`** formats spacing between blocks in the editor

The following files are **only** used on the front-end:

* **`comments.css`** styles the optional comments section 
* **`root.css`** resets and normalizes styles across browsers
* **`menus.css`** styles the complex drop-menus throughout the theme
* **`theme.css`** styles everything that doesn't display in the block editor (header, footer, etc.)

The following files are used on **both** the front-end and in the block editor:

* **`uclasses.css`** universal utility classes
* **`blocks.css`** styles for custom block modules like hero, gallery, and more
* **`variables.css`** sets the global custom properties for all CSS
* **`content.css`** styles any content that will display in the block editor and the front-end

## Styling your child theme

The following list of files should be copied and edited to your child theme. **Note:** If you copy and edit any other CSS files, you will not be able to take advantage of future updates to those files.

* **`variables.css`**
* **`theme.css`**
* **`content.css`** 

### 1. Variables.css

This is the first file to update. This controls all the global custom properties throughout the theme. **Don't** delete any property but you can edit values and create new custom properties and values. Use your browser's inspector to preview changes live.

### 2. Theme.css

This is the second file to update. This file controls the theme's general design excluding any content that appears in the block editor. This file will include default styles responsible for the layout. You can update the values or remove whole properties and write new ones. Use your browser's inspector to preview changes live.

### 3. Content.css

This is the last file to update. This file controls the main content area that displays in the block editor and the front-end. You'll find typography and button styles here. **Don't** delete any property just edit and add new styles. Use your browser's inspector to preview changes live.

## Editing block modules

Just copy and update the custom properties. When you use the browser's inspector you'll find many block modules that list all the custom properties like below:

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


Say for instance,  you're using another `.nclogo` block in the `#header` element, you would write new CSS like so and only update the properties and values that matter:

```css
#header .nclogo {
  --logo-text-size: 1.5em;
  --logo-padding: 1.75em 0;
}
```

## Performance

All these CSS files mean multiple `HTTP` requests that could slow down your site. To solve this issue, use a plugin like [Auto Optimize](https://wordpress.org/plugins/autoptimize/) to combine and cache all your theme and plugin CSS files into one file.