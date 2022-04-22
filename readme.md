# Documentation

***Note:** This theme requires the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) plugin IF you want to utilize the included custom Gutenberg blocks.*

As a front-end developer converting design concepts to live websites, I created the NC Framework to serve as a starting point from which to build custom websites for WordPress. It can be used as a parent theme or extended with a child theme. 

The theme is coded in:

* **Modern CSS** - uses flexbox, grid, and custom properties
* **BEM CSS** - uses Block Element Modifier coding methodology
* **Semantic HTML** - modern HTML5 with support for technical SEO
* **Accessible** - supports screen readers and keyboard navigation
* **Responsive** - mobile-friendly with support for responsive images

The theme supports all of WordPress' native features and standard templates. The theme comes with basic CSS for layout and responsive purposes, but it's up to you to make the theme match your design concept.

## Demo site (Real Estate)

**[Visit this link to see a site built with the NC Framework](https://www.nealchester.com/demos/realestate/)**.

## How to get started

1. Install this parent theme.
2. Create a child-theme and activate it. 
3. Copy `content.css`, `theme.css`, and `variables.css` from the parent CSS folder into your child-theme.
4. Begin editing and writing new CSS to match your design concept. 

If your concept requires more customization, you will need to copy and edit template files from the parent theme. Refer to the WordPress Codex for more information about [child-themes](https://developer.wordpress.org/themes/advanced-topics/child-themes/). To learn more about the above mentioned CSS files, visit this themes' [CSS documentation](https://github.com/nealchester/NC-Framework/tree/main/css#css-documentation) here.

## Full WordPress feature support including:

  * The Customizer
  * Custom menus
  * Widgets (8 areas)
  * Custom logo
  * Banner image
  * Child themes
  * Featured images
  * Gutenberg blocks
  * Translation ready
  * Threaded comments
  * Post meta
  * Pagination
  * Next and previous posts

## 10+ Custom Gutenberg blocks

  * hero
  * split hero
  * accordion
  * columns
  * gallery w/ lightbox pop-up
  * image slider w/ lightbox pop-up
  * text slider
  * media + content
  * list posts
  * one page navigation
  * rich text content
  * dividers


## Folder Structure

This section explains the general content within the folders and main files.

### Main directory folders
Refer to the `readme.md` file within each folder for more information.

* **`acf-json`** - stores custom fields data (don't delete)
* **`blocks`** - stores all custom Gutenberg blocks and supported assets
* **`customizer`** - stores all the new Customizer features function files
* **`fonts`** - stores all font files including icon font files
* **`functions`** - stores all functions files connected to the `functions.php` file
* **`img`** - stores all raster and vector images.
* **`js`** - stores all JavaScript files
* **`parts`** - stores all reusable template parts
* **`templates`** - stores optional custom templates

### Template files
The following explains the purpose of the files in the main directory of the theme:

* **`404.php`** - displays a message if a page isn't found
* **`archive.php`** - displays selected taxonomy entries
* **`author.php`** - displays single author meta and all their blog entries
* **`comments.php`** - displays the comments template
* **`functions.php`** - list and includes all functions housed in the `functions` folder 
* **`home.php`** - displays the latest blog entries 
* **`image.php`** - displays a single attachment image with meta data
* **`index.php`** - displays a default page if no other templates are available
* **`page.php`** - displays a standard non-blog entry page
* **`readme.md`** - provides documentation
* **`screenshot.png`** - an image to represent the installed theme
* **`search.php`** - displays a list of results from a search query
* **`single.php`** - displays a single blog entry
* **`style.css`** - stores theme information for WordPress' admin areas, no CSS is included in this file but comments
* **`theme.json`** - controls the block editor colors, fonts, etc.

***

For more information contact neal@nealchester.com
