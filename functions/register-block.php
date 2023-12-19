<?php 

/**
 * Register Block Types (ACF)
 */

function pickledtv_register_blocks(){
    if (function_exists('pickledtv_register_blocks')){
        // Hero Block
		acf_register_block( array(
			'name'				=> 'pickledtv-hero',
			'title'				=> __( 'PickledTv Hero' ),
			'description'		=> __( 'Create a page hero for the PickledTV website' ),
			'render_template'	=> 'template-parts/blocks/hero/hero.php',
			'category'			=> 'nourish_category',
			'icon'				=> 'slides',
			'keywords'			=> array( 'pickledtv, hero' ),
			'enqueue_assets'    => function() {
				wp_enqueue_style( 'hero-style', get_stylesheet_directory_uri() . '/template-parts/blocks/hero/hero.css', array(), '1.0.0' );
			}
		) );
    }
}