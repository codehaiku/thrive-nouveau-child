<?php
/**
 * Child Theme Functions 
 * thrive-nouveau-child/functions.php
 * Child theme functions.php
 * Put all your php script modifications here.
 *
 * @version  1.0
 */
// Enqueue boostrap.
add_action( 'wp_enqueue_scripts', 'thrive_nouveau_child_enqueue_bootstrap' );

// The child theme style.css.
add_action( 'wp_enqueue_scripts', 'thrive_nouveau_child_enqueue' );

/**
 * Re-enqeue bootstrap file. Not doing this would re-index our style.css ahead of bootstrap.
 * @return void
 */
function thrive_nouveau_child_enqueue_bootstrap() {
	wp_enqueue_style( 'thrive-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array('thrive-google-font') );
}

/**
 * Actually enqueue our stylesheet.
 * @return void
 */
function thrive_nouveau_child_enqueue() 
{

	$parent_style = 'thrive-style';

	wp_enqueue_style( $parent_style, 
		get_template_directory_uri(). '/style.css'  );

	wp_enqueue_style( 'thrive-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style, 'thrive-bootstrap' ),
        wp_get_theme()->get('Version')
    );

}
