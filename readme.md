# Documentation

***Note:** This theme requires the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) plugin IF you want to utilize the included custom Gutenberg blocks.*

As a front-end developer converting design concepts to live websites, I created the NC Framework to serve as a starting point from which to build custom websites for WordPress. It can be used as a parent theme or extended with a child theme. 

The theme is coded in:

* **Modern CSS** - uses flexbox, grid, and custom properties
* **Semantic HTML** - modern HTML5 with support for technical SEO
* **Accessible** - supports screen readers and keyboard navigation
* **Responsive** - mobile-friendly with support for responsive images

The theme supports all of WordPress' native features, provides all the standard templates to display content, and does a whole lot more. The theme comes with basic CSS for layout and responsive purposes, but it's up to you to make the theme match your design concept.

## How to get started

1. Install this parent theme.
2. Create a child-theme and activate it. 
3. Copy `content.css`, `theme.css`, and `variables.css` from the parent CSS folder into your child-theme.
4. Begin editing and writing new CSS to match your design concept. 

If your concept requires more customization, you will need to copy and edit the necessary files from the parent theme. Refer to the WordPress Codex for more information about [child-themes](https://developer.wordpress.org/themes/advanced-topics/child-themes/).

## Full WordPress feature support including:

  * The Customizer
  * Custom menus
  * Widgets (8 areas)
  * Custom logo
  * Banner image
  * Child themes
  * Featured images
  * Gutenberg blocks
  * Threaded comments
  * Post meta
  * Pagination
  * Next and previous posts

## 10+ Custom Gutenberg blocks

  * hero
  * split hero
  * accordion content
  * columns
  * gallery w/ lightbox pop-up
  * image slider w/ lightbox pop-up
  * text slider
  * media + content
  * list posts
  * one page navigation
  * text content (columned)
  * dividers


## Folder Structure

This section explains the theme's file structure and the general content within the folders and main files directory. Refer to the `readme.md` file within each folder for more information.

### Main directory folders

* **acf-json** - Stores custom fields data (don't delete).
* **blocks** - Stores all custom Gutenberg blocks.
* **components** - This folder's contents are under construction.
* **customizer** - Stores all the new Customizer features function files.
* **fonts** - Stores all font files including icon font files.
* **functions** - Stores all functions files connected to the `functions.php` file.
* **img** - Stores all raster and vector images. 
* **js** - Stores all JavaScript files.
* **parts** - Stores all reusable template parts.
* **templates** - Stores optional custom templates.

### Template files
The following explains the purpose of the files in the main directory of the theme:

* **404.php** - displays a message if a page isn't found
* **archive.php** - displays selected taxonomy entries
* **author.php** - displays single author meta and all their blog entries
* **comments.php** - displays the comments template
* **functions.php** - list and includes all functions housed in the `functions` folder 
* **home.php** - displays the latest blog entries 
* **image.php** - displays a single attachment image with meta data
* **index.php** - displays a default page if no other templates are available
* **page.php** - displays a standard non-blog entry page
* **readme.md** - provides documentation on the files
* **screenshot.png** - an image to represent the installed theme
* **search.php** - displays a list of results from a search query
* **single.php** - displays a single blog entry
* **style.css** - stores theme information for WordPress' admin areas, no CSS is included in this file but comments

***

**Changes coming soon:**

* CSS `blocks.css` will be separated into files and united with SCSS
* Components will become functions
* More drop-menu variations and styles
* Incorporation of a better [scroll animation library](https://greensock.com/)
* Better accessibility
* Custom block expansion options
* Remove 1 of 3 responsive header features

***

For more information contact neal@nealchester.com