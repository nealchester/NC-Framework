<?php
add_action( 'wp_head',    'nc_default_site_icon', 99 );
add_action( 'login_head', 'nc_default_site_icon', 99 );

function nc_default_site_icon(){
    if( ! has_site_icon()  && ! is_customize_preview() ) {?>

    <?php $favicon = get_theme_file_uri('/img/default-favicon.png'); ?>
        
    <link rel="icon" href="<?php echo $favicon; ?>" sizes="32x32" />
    <link rel="apple-touch-icon" href="<?php echo $favicon; ?>" />
    <meta name="msapplication-TileImage" content="<?php echo $favicon; ?>" />

    <?php    
    }
} 