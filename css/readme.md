# The CSS files

Some CSS files are for the front-end or the block editor, and some files are used for both. With the introduction of the block editor in WordPress, what displays on the front-end should match what displays in the block editor (moderately). Therefore, the reason for multiple files.

The following files are **only** used in the block editor:

* **`editor.css`** provides styles to the block editor to match block widths

The following files are **only** used on the front-end:

* **`reset.css`** resets and normalizes styles across browsers
* **`menus.css`** styles the complex drop-menus throughout the theme
* **`theme.css`** styles everything that doesn't display in the block editor (header, footer, etc.)

The following files are **only** used on the front-end and **only** loaded if the template is displayed:

* **`t-author.css`** styles the author page. 
* **`t-comments.css`** styles the optional comments section. 
* **`t-image.css`** styles the image attachment page. 

The following files are used on **both** the front-end and in the block editor:

* **`uclasses.css`** universal utility classes
* **`wpblocks.css`** re-styles some WordPress blocks
* **`variables.css`** sets the global custom properties for all CSS
* **`content.css`** styles any content that will display in the block editor and the front-end

***

## Performance

All these CSS files mean multiple `HTTP` requests that could slow down your site. To solve this issue, use a plugin like [Auto Optimize](https://wordpress.org/plugins/autoptimize/) to combine and cache all your theme and plugin CSS files into one file.