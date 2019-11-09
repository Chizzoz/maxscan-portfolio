<?php
/**
 * @package Moving Company Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses moving_company_lite_header_style()
*/
function moving_company_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'moving_company_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'moving_company_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'moving_company_lite_custom_header_setup' );

if ( ! function_exists( 'moving_company_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see moving_company_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'moving_company_lite_header_style' );

function moving_company_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .top-bar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'moving-company-lite-basic-style', $custom_css );
	endif;
}
endif;