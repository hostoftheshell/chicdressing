<?php 

add_action( 'wp_enqueue_scripts', 'chicdressing_enqueue_styles' );
function chicdressing_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/theme.css')); 
}

add_filter( 'big_image_size_threshold', '__return_false' );



function deregister_gfonts_scripts() {
    // Tableau de polices Google à déchargé
    $google_fonts = array(
        'ashe-playfair-font',
        'ashe-opensans-font',
        'ashe-kalam-font',
        'ashe-rokkitt-font'
    );

    // Parcours chaque police et la décharge si elle est enregistrée
    foreach ( $google_fonts as $font ) {
        if ( wp_style_is( $font, 'registered' ) ) {
            wp_dequeue_style( $font );
            wp_deregister_style( $font );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'deregister_gfonts_scripts', 20 );
 